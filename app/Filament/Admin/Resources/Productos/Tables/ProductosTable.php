<?php

namespace App\Filament\Admin\Resources\Productos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_producto')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('nombre_producto')
                    ->label('Nombre del Producto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('precio')
                    ->label('Precio')
                    ->money('MXN')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Ver'),
                EditAction::make()
                    ->label('Editar'),
                DeleteAction::make()
                    ->label('Eliminar')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('id_producto', 'desc')
            ->emptyStateHeading('Aún no hay productos registrados');
    }
}