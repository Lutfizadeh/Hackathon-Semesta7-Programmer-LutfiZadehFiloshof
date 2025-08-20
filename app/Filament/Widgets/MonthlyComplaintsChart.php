<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class MonthlyComplaintsChart extends ChartWidget
{
    protected static ?string $heading = 'Keluhan Bulanan';

    protected function getData(): array
    {
            $labels = [];
            $data = [];

            for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths(11 - $i);
            $labels[] = $month->format('M Y');
            $data[] = Report::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Keluhan',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2,
                    'tension' => 0.3, // untuk garis smooth
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
