<?php

namespace App\Filament\Admin\Resources\Productos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombreProducto')
                    ->label('Nombre del Producto')
                    ->weight('bold')
                    ->size('lg'),

                TextEntry::make('precio')
                    ->label('Precio Unitario')
                    ->money('MXN'),

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