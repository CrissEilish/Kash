<?php

declare(strict_types=1);

return [
    'currency' => [
        'base' => env('KASH_DEFAULT_CURRENCY', 'USD'),
        'bcv_endpoint' => env('KASH_BCV_RATE_ENDPOINT'),
    ],

    'payment_links' => [
        'ttl_minutes' => (int) env('KASH_PAYMENT_TOKEN_TTL_MINUTES', 60),
    ],

    'whatsapp' => [
        'default_prefix' => env('KASH_COUNTRY_CALLING_CODE', '+58'),
    ],

    'payment_methods' => [
        'pago_movil' => 'Pago Móvil (VES)',
        'cash_usd'   => 'Efectivo (USD)',
        'transfer'   => 'Transferencia',
    ],
];
