<?php

namespace App\Filament\Resources\Pedidos\Tables;

use App\Models\Cliente;
use App\Models\Pedido;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PedidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre_pedido')
                    ->label('Pedido')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cliente.nombre')
                    ->label('Cliente')
                    ->formatStateUsing(
                        fn (Pedido $record): string => trim(
                            ($record->cliente?->nombre ?? '') . ' ' .
                            ($record->cliente?->primer_apellido ?? '') . ' ' .
                            ($record->cliente?->segundo_apellido ?? '')
                        )
                    )
                    ->searchable()
                    ->sortable(),

                TextColumn::make('estado.tipo')
                    ->label('Estado del pedido')
                    ->badge()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('id_cliente')
                    ->label('Cliente')
                    ->relationship('cliente', 'nombre')
                    ->getOptionLabelFromRecordUsing(
                        fn (Cliente $record): string => trim(
                            "{$record->nombre} {$record->primer_apellido} {$record->segundo_apellido}"
                        )
                    )
                    ->searchable()
                    ->preload(),

                SelectFilter::make('id_estado_pedido')
                    ->label('Estado del pedido')
                    ->relationship('estado', 'tipo')
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
                    ->requiresConfirmation()
                    ->before(function (DeleteAction $action, Pedido $record): void {
                        if ($record->detalles()->exists()) {
                            Notification::make()
                                ->title('El pedido tiene detalles')
                                ->body(
                                    'Elimina primero sus detalles para poder eliminar el pedido.'
                                )
                                ->warning()
                                ->send();

                            $action->halt();
                        }
                    }),
            ])
            ->defaultSort('id_pedido', 'desc')
            ->emptyStateHeading('Aún no hay pedidos');
    }
}