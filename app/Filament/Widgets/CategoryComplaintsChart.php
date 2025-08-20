<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\ChartWidget;

class CategoryComplaintsChart extends ChartWidget
{
    protected static ?string $heading = 'Keluhan Per Kategori';

    protected function getData(): array
    {
        $categories = Report::select('category')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Keluhan',
                    'data' => $categories->pluck('total')->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                ],
            ],
            'labels' => $categories->pluck('category')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
