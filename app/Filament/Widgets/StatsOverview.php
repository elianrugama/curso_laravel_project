<?php

namespace App\Filament\Widgets;

use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Pago;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Proyectos Activos', Proyecto::where('estado', 'en_progreso')->count())
                ->description('Proyectos en curso')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary'),
            
            Stat::make('Tareas Pendientes', Tarea::where('estado', 'pendiente')->count())
                ->description('Necesitan atención')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            
            Stat::make('Ingresos Totales', function () {
                return '$' . number_format(Pago::where('estado', 'completado')->sum('monto'), 2);
            })
                ->description('Pagos recibidos')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
        ];
    }
}
