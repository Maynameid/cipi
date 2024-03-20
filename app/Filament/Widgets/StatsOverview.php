<?php

namespace App\Filament\Widgets;

use App\Models\Site;
use App\Models\Stat as StatModel;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '5s';

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $stats = StatModel::latest()->first();
        $chart = StatModel::limit(120)->orderBy('created_at', 'desc')->get();

        return [
            Stat::make('IP', config('panel.serverIp'))
                ->description('Server IP')
                ->descriptionIcon('heroicon-m-globe-alt'),
            Stat::make('Name', config('panel.serverName'))
                ->description('Server name')
                ->descriptionIcon('heroicon-m-server'),
            Stat::make('CPU', (isset($stats->cpu)) ? $stats->cpu.'%' : '0'.'%')
                ->description('CPU usage')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->chart($chart->pluck('cpu')->reverse()->toArray()),
            Stat::make('RAM', (isset($stats->ram)) ? $stats->ram.'%' : '0'.'%')
                ->description('RAM usage')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->chart($chart->pluck('ram')->reverse()->toArray()),
            Stat::make('HDD', (isset($stats->hdd)) ? $stats->hdd : '0%')
                ->description('HDD usage')
                ->descriptionIcon('heroicon-m-cloud'),
            Stat::make('Sites', Site::count())
                ->description('Hosted sites')
                ->descriptionIcon('heroicon-m-rocket-launch'),
        ];
    }
}
