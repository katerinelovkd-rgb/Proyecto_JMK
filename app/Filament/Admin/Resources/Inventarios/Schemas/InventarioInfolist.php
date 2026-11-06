<?php

namespace App\Filament\Admin\Resources\Inventarios\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InventarioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('producto.nombreProducto')
                    ->label('Producto'),

                TextEntry::make('existencia')
                    ->label('Existencia')
                    ->numeric(),

                TextEntry::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime()
                    ->placeholder('-'),
            ])
            ->columns(2);
    }
}