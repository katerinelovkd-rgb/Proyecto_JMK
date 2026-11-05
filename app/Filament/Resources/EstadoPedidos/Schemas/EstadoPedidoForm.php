<?php

namespace App\Filament\Resources\EstadoPedidos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EstadoPedidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tipo')
                    ->label('Estado del pedido')
                    ->placeholder('Ej. en preparación')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'El estado es obligatorio.',
                        'max' => 'El estado no puede pasar de 20 caracteres.',
                        'unique' => 'Ese estado ya existe.',
                    ]),
            ]);
    }
}