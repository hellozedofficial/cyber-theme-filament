<?php

namespace Workbench\App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
    protected ?string $heading = 'Liquid Analytics Overview';

    protected ?string $description = 'Real-time metrics with liquid spring animations and ambient updates';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Inflow Revenue', '$428,950')
                ->description('32.4% increase from last month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([35, 42, 38, 55, 62, 58, 74, 82, 94])
                ->color('success'),

            Stat::make('Active Liquid Users', '14,892')
                ->description('18.2% new sessions this week')
                ->descriptionIcon('heroicon-m-sparkles')
                ->chart([14, 18, 15, 24, 28, 26, 34, 38, 45])
                ->color('primary'),

            Stat::make('Glass Conversion Rate', '8.64%')
                ->description('3.1% higher than industry avg')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([4.5, 5.2, 4.9, 6.4, 7.1, 6.8, 8.2, 8.64])
                ->color('warning'),

            Stat::make('Liquid Filter Latency', '14.2ms')
                ->description('48% GPU shader optimization')
                ->descriptionIcon('heroicon-m-bolt')
                ->chart([38, 32, 28, 25, 21, 18, 16, 14.2])
                ->color('info'),
        ];
    }
}
