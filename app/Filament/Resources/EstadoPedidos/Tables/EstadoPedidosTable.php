<?php

namespace App\Filament\Resources\EstadoPedidos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EstadoPedidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_estado_pedido')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('tipo')
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pedidos_count')
                    ->label('Pedidos con este estado')
                    ->counts('pedidos')
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->label('Registrado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id_estado_pedido')
            ->emptyStateHeading('No hay estados registrados')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}