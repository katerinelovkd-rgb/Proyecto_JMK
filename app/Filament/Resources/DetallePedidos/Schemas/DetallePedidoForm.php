<?php

namespace App\Filament\Resources\DetallePedidos\Schemas;

use App\Models\Producto;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class DetallePedidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_pedido')
                    ->label('Pedido')
                    ->relationship(
                        name: 'pedido',
                        titleAttribute: 'nombre_pedido'
                    )
                    ->searchable()
                    ->preload()
                    ->placeholder('Selecciona un pedido')
                    ->required(),

                Select::make('id_producto')
                    ->label('Producto')
                    ->relationship(
                        name: 'producto',
                        titleAttribute: 'nombre_producto'
                    )
                    ->searchable()
                    ->preload()
                    ->placeholder('Selecciona un producto')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state): void {
                        $producto = filled($state)
                            ? Producto::find($state)
                            : null;

                        $set('precio_unitario', $producto?->precio);
                    }),

                TextInput::make('cantidad')
                    ->label('Cantidad')
                    ->integer()
                    ->minValue(1)
                    ->maxValue(2147483647)
                    ->default(1)
                    ->required(),

                TextInput::make('precio_unitario')
                    ->label('Precio unitario')
                    ->numeric()
                    ->prefix('$')
                    ->step(0.01)
                    ->minValue(0)
                    ->maxValue(999999.99)
                    ->rules(['decimal:0,2'])
                    ->helperText('Se completa al seleccionar un producto.')
                    ->required(),
            ])
            ->columns(2);
    }
}