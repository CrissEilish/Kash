<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\DebtorAccount;

class WhatsAppStatementService
{
    /**
     * Normalizes local Venezuelan numbers (e.g. 0412... -> +58412...) or preserves international format.
     */
    public function normalizePhone(string $rawPhone): string
    {
        $digits = preg_replace('/\D+/', '', $rawPhone) ?? '';
        if (str_starts_with($digits, '0') && strlen($digits) === 11) {
            return '+58' . substr($digits, 1);
        }
        if (str_starts_with($digits, '58') && strlen($digits) === 12) {
            return '+' . $digits;
        }
        return '+' . ltrim($digits, '+');
    }

    public function buildStatementPayload(DebtorAccount $account, string $paymentUrl, float $activeRate): array
    {
        $phone      = $this->normalizePhone((string) $account->phone);
        $balanceUsd = $account->balanceUsd();
        $rate       = (float) ($account->custom_bcv_rate ?: $activeRate);
        $balanceVes = $balanceUsd * $rate;

        $lines = [
            "Hola *{$account->full_name}*,",
            "",
            "Resumen de tu estado de cuenta en *Kash POS*:",
            sprintf("• Saldo pendiente: *$%.2f USD* (Bs. %.2f)", $balanceUsd, $balanceVes),
            sprintf("• Tasa aplicada: Bs. %.2f / USD", $rate),
            "",
            "Enlace temporal de pago (válido por 1 hora):",
            $paymentUrl,
        ];

        $message = implode("\n", $lines);
        $waUrl   = sprintf('https://wa.me/%s?text=%s', ltrim($phone, '+'), rawurlencode($message));

        return [
            'phone'   => $phone,
            'message' => $message,
            'wa_url'  => $waUrl,
        ];
    }
}
