<?php

namespace App\Filament\Widgets;

use App\Models\Pago;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PagosRecientes extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Pago::latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('proyecto.titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monto')
                    ->money('USD'),
                Tables\Columns\TextColumn::make('fecha_pago')
                    ->date(),
                Tables\Columns\TextColumn::make('estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente' => 'warning',
                        'completado' => 'success',
                    }),
            ]);
    }
} 