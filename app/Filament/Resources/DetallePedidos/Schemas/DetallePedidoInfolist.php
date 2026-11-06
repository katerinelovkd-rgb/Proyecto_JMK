<?php

namespace App\Filament\Resources\DetallePedidos\Schemas;

use App\Models\DetallePedido;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DetallePedidoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pedido.nombre_pedido')
                    ->label('Pedido'),

                TextEntry::make('producto.nombre_producto')
                    ->label('Producto'),

                TextEntry::make('cantidad')
                    ->label('Cantidad'),

                TextEntry::make('precio_unitario')
                    ->label('Precio unitario')
                    ->money('MXN'),

                TextEntry::make('importe')
                    ->label('Importe')
                    ->state(
                        fn (DetallePedido $record): float =>
                            $record->cantidad * (float) $record->precio_unitario
                    )
                    ->money('MXN'),
            ])
            ->columns(2);
    }
}