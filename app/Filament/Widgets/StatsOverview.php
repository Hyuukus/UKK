<?php

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Menunggu', Aspiration::where('status', 'Menunggu')->count()),
            Stat::make('Proses', Aspiration::where('status', 'Proses')->count()),
            Stat::make('Selesai', Aspiration::where('status', 'Selesai')->count()),
        ];
    }
}
