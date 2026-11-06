<?php

namespace App\Filament\Admin\Resources\Inventarios\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InventarioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_producto')
                    ->label('Producto')
                    ->relationship('producto', 'nombre_producto') // Coincide exactamente con el modelo Producto
                    ->required()
                    ->validationMessages([
                        'required' => 'El producto es obligatorio.',
                    ]),

                TextInput::make('existencia')
                    ->label('Existencia')
                    ->required()
                    ->validationMessages([
                        'required' => 'La existencia es obligatoria.',
                    ]),
            ])
            ->columns(2);
    }
}