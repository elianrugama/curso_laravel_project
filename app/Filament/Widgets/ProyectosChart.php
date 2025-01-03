<?php

namespace App\Filament\Widgets;

use App\Models\Proyecto;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ProyectosChart extends ChartWidget
{
    protected static ?string $heading = 'Proyectos por Estado';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Proyecto::selectRaw('estado, count(*) as total')
            ->groupBy('estado')
            ->get();

        $datasets = [
            'label' => 'Proyectos',
            'data' => $data->pluck('total')->toArray(),
            'backgroundColor' => [
                '#f59e0b', // warning - en_progreso
                '#10b981', // success - completado
                '#ef4444', // danger - cancelado
            ],
            'borderColor' => [
                '#f59e0b', // warning - en_progreso
                '#10b981', // success - completado
                '#ef4444', // danger - cancelado
            ],
        ];

        $labels = $data->pluck('estado')->map(function ($estado) {
            return match ($estado) {
                'en_progreso' => 'En Progreso',
                'completado' => 'Completado',
                'cancelado' => 'Cancelado',
            };
        })->toArray();

        return [
            'datasets' => [$datasets],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'height' => 400,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
} 