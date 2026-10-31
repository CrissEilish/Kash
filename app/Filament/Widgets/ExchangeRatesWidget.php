<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ExchangeRatesWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Tasa Oficial BCV (USD)', 'Bs. --')
                ->description('Sincronización en tiempo real')
                ->color('success'),
            Stat::make('Tasa Oficial BCV (EUR)', 'Bs. --')
                ->description('Referencia cambiaria Euro')
                ->color('info'),
        ];
    }
}
