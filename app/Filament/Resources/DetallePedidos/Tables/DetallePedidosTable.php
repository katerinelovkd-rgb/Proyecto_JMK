<?php

namespace App\Filament\Resources\DetallePedidos\Tables;

use App\Models\DetallePedido;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DetallePedidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pedido.nombre_pedido')
                    ->label('Pedido')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('producto.nombre_producto')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cantidad')
                    ->label('Cantidad')
                    ->sortable(),

                TextColumn::make('precio_unitario')
                    ->label('Precio unitario')
                    ->money('MXN')
                    ->sortable(),

                TextColumn::make('importe')
                    ->label('Importe')
                    ->state(
                        fn (DetallePedido $record): float =>
                            $record->cantidad * (float) $record->precio_unitario
                    )
                    ->money('MXN'),
            ])
            ->filters([
                SelectFilter::make('id_pedido')
                    ->label('Pedido')
                    ->relationship('pedido', 'nombre_pedido')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('id_producto')
                    ->label('Producto')
                    ->relationship('producto', 'nombre_producto')
                    ->searchable()
                    ->preload(),
            ])
            ->deferFilters(false)
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Filtros')
            )
            ->recordActions([
                ViewAction::make()
                    ->label('Ver'),

                EditAction::make()
                    ->label('Editar'),

                DeleteAction::make()
                    ->label('Eliminar')
                    ->requiresConfirmation(),
            ])
            ->defaultSort('id_detalle_pedido', 'desc')
            ->emptyStateHeading('Aún no hay detalles de pedidos')
            ->emptyStateDescription(
                'Agrega un producto a un pedido para comenzar.'
            );
    }
}