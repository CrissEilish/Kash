<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DebtorAccount extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'custom_bcv_rate',
        'is_settled',
    ];

    protected $casts = [
        'custom_bcv_rate' => 'decimal:4',
        'is_settled'      => 'boolean',
    ];

    public function entries(): HasMany
    {
        return $this->hasMany(LedgerEntry::class);
    }

    /**
     * Net balance in USD (positive = debt in red, negative/zero = settled in green).
     */
    public function balanceUsd(): float
    {
        return (float) $this->entries()->sum('amount_usd');
    }

    /**
     * Records a partial payment (Abono) as an automatic negative ledger entry.
     */
    public function recordPartialPayment(float $amountUsd, string $method, ?string $note = null): LedgerEntry
    {
        return $this->entries()->create([
            'type'           => 'credit',
            'amount_usd'     => -abs($amountUsd),
            'payment_method' => $method,
            'description'    => $note ?? sprintf('Abono (%s)', strtoupper($method)),
            'recorded_at'    => now(),
        ]);
    }

    /**
     * Liquidates the entire outstanding balance (Pagar Todo).
     */
    public function settleAll(string $method = 'pago_movil'): ?LedgerEntry
    {
        $outstanding = $this->balanceUsd();
        if ($outstanding <= 0) {
            return null;
        }

        $entry = $this->recordPartialPayment($outstanding, $method, 'Liquidación total de cuenta');
        $this->update(['is_settled' => true]);

        return $entry;
    }
}
