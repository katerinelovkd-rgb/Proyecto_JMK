<?php

namespace App\Filament\Admin\Resources\Productos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_producto')
                    ->label('Nombre del Producto')
                    ->placeholder('Ej. Café americano')
                    ->required()
                    ->maxLength(50)
                    ->validationMessages([
                        'required' => 'El nombre del producto es obligatorio.',
                        'max' => 'El nombre no puede pasar de 50 caracteres.',
                    ]),

                TextInput::make('precio')
                    ->label('Precio unitario')
                    ->placeholder('Ej. 45.50')
                    ->minValue(0)
                    ->required()
                    ->validationMessages([
                        'required' => 'El precio es obligatorio.',
                    ]),
            ])
            ->columns(2);
    }
}