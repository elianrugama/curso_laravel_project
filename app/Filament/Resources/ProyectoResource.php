<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyectoResource\Pages;
use App\Filament\Resources\ProyectoResource\RelationManagers;
use App\Models\Proyecto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProyectoResource extends Resource
{
    protected static ?string $model = Proyecto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Proyecto';
    protected static ?string $pluralModelLabel = 'Proyectos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Ingrese el título del proyecto'),
                Forms\Components\Select::make('cliente_id')
                    ->relationship('cliente', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione un cliente'),
                Forms\Components\Textarea::make('descripcion')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->placeholder('Ingrese la descripción del proyecto'),
                Forms\Components\Select::make('estado')
                    ->options([
                        'en_progreso' => 'En Progreso',
                        'completado' => 'Completado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->required()
                    ->placeholder('Seleccione el estado del proyecto'),
                Forms\Components\TextInput::make('presupuesto')
                    ->numeric()
                    ->prefix('$')
                    ->required()
                    ->placeholder('Ingrese el presupuesto'),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required()
                    ->placeholder('Ingrese la fecha de inicio'),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->required()
                    ->placeholder('Ingrese la fecha de fin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cliente.nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'en_progreso' => 'warning',
                        'completado' => 'success',
                        'cancelado' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('presupuesto')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProyectos::route('/'),
            'create' => Pages\CreateProyecto::route('/create'),
            'edit' => Pages\EditProyecto::route('/{record}/edit'),
        ];
    }
}
