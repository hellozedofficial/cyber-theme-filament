<?php

namespace Workbench\App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RevenueChartWidget extends ChartWidget
{
    protected ?string $heading = 'Monthly Revenue & Growth Trajectory';

    protected ?string $description = 'Visualizing dynamic cashflow curves and annual targets';

    protected static ?int $sort = 2;

    protected ?string $maxHeight = '275px';

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 2,
    ];

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Current Year ($k)',
                    'data' => [45, 58, 62, 79, 85, 94, 110, 125, 142, 168, 185, 215],
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.08)',
                    'fill' => 'start',
                    'tension' => 0.4,
                    'borderWidth' => 2.5,
                    'pointRadius' => 2,
                    'pointHoverRadius' => 6,
                    'pointBackgroundColor' => '#f59e0b',
                ],
                [
                    'label' => 'Previous Year ($k)',
                    'data' => [30, 38, 44, 52, 60, 68, 75, 84, 92, 104, 118, 130],
                    'borderColor' => 'rgba(148, 163, 184, 0.45)',
                    'backgroundColor' => 'transparent',
                    'borderDash' => [4, 4],
                    'tension' => 0.4,
                    'borderWidth' => 1.8,
                    'pointRadius' => 0,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                    'align' => 'end',
                    'labels' => [
                        'boxWidth' => 8,
                        'usePointStyle' => true,
                        'pointStyle' => 'circle',
                        'padding' => 12,
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'grid' => [
                        'color' => 'rgba(148, 163, 184, 0.08)',
                        'borderDash' => [4, 4],
                    ],
                    'border' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
