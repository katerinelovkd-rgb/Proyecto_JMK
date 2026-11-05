<?php

namespace App\Filament\Resources\Clientes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClienteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->placeholder('Ej. Ana')
                    ->required()
                    ->maxLength(50)
                    ->regex('/^[\pL\s\'-]+$/u')
                    ->validationMessages([
                        'required' => 'El nombre es obligatorio.',
                        'max' => 'El nombre no puede pasar de 50 caracteres.',
                        'regex' => 'El nombre solo puede contener letras y espacios.',
                    ]),
                TextInput::make('primer_apellido')
                    ->label('Primer apellido')
                    ->placeholder('Ej. López')
                    ->required()
                    ->maxLength(50)
                    ->regex('/^[\pL\s\'-]+$/u')
                    ->validationMessages([
                        'required' => 'El primer apellido es obligatorio.',
                        'max' => 'El primer apellido no puede pasar de 50 caracteres.',
                        'regex' => 'El primer apellido solo puede contener letras y espacios.',
                    ]),
                TextInput::make('segundo_apellido')
                    ->label('Segundo apellido')
                    ->placeholder('Ej. García')
                    ->required()
                    ->maxLength(50)
                    ->regex('/^[\pL\s\'-]+$/u')
                    ->validationMessages([
                        'required' => 'El segundo apellido es obligatorio.',
                        'max' => 'El segundo apellido no puede pasar de 50 caracteres.',
                        'regex' => 'El segundo apellido solo puede contener letras y espacios.',
                    ]),
            ]);
    }
}