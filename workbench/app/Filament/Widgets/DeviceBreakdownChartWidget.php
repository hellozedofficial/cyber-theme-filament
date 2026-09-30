<?php

namespace Workbench\App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DeviceBreakdownChartWidget extends ChartWidget
{
    protected ?string $heading = 'Sessions by Platform';

    protected ?string $description = 'Cross-device user share breakdown';

    protected static ?int $sort = 3;

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
                    'label' => 'Share (%)',
                    'data' => [52, 32, 12, 4],
                    'backgroundColor' => [
                        '#f59e0b',
                        '#6366f1',
                        '#10b981',
                        '#0ea5e9',
                    ],
                    'borderWidth' => 0,
                    'hoverOffset' => 6,
                ],
            ],
            'labels' => ['Mobile', 'Desktop', 'Tablet', 'Other'],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'cutout' => '72%',
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                    'labels' => [
                        'boxWidth' => 8,
                        'usePointStyle' => true,
                        'pointStyle' => 'circle',
                        'padding' => 14,
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
