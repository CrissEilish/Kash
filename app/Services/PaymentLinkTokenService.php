<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\DebtorAccount;
use Illuminate\Support\Facades\URL;

class PaymentLinkTokenService
{
    /**
     * Generates a temporary signed payment URL valid for exactly 1 hour (60 minutes).
     */
    public function createOneHourLink(DebtorAccount $account): array
    {
        $ttlMinutes = (int) config('kash.payment_links.ttl_minutes', 60);
        $expiresAt  = now()->addMinutes($ttlMinutes);

        $signedUrl = URL::temporarySignedRoute(
            'kash.statement.show',
            $expiresAt,
            ['debtor' => $account->getKey()]
        );

        return [
            'url'        => $signedUrl,
            'expires_at' => $expiresAt->toIso8601String(),
            'ttl_sec'    => $ttlMinutes * 60,
        ];
    }
}
