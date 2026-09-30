<?php

namespace Workbench\App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CategorySalesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Revenue by Category';

    protected ?string $description = 'Sales distribution across modules ($k)';

    protected static ?int $sort = 4;

    protected ?string $maxHeight = '275px';

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Revenue ($k)',
                    'data' => [185, 142, 110, 95, 68],
                    'backgroundColor' => [
                        'rgba(245, 158, 11, 0.85)',
                        'rgba(99, 102, 241, 0.80)',
                        'rgba(16, 185, 129, 0.80)',
                        'rgba(14, 165, 233, 0.80)',
                        'rgba(168, 85, 247, 0.80)',
                    ],
                    'borderRadius' => 6,    
                    'maxBarThickness' => 28,
                ],
            ],
            'labels' => ['Enterprise', 'Liquid Pro', 'UI Kits', 'Developer', 'Support'],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => false,
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
        return 'bar';
    }
}
