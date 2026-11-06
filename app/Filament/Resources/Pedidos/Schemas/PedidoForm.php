<?php

namespace App\Filament\Resources\Pedidos\Schemas;

use App\Models\Cliente;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PedidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_pedido')
                    ->label('Nombre del pedido')
                    ->placeholder('Ej. Pedido para llevar')
                    ->required()
                    ->maxLength(20)
                    ->columnSpanFull(),

                Select::make('id_cliente')
                    ->label('Cliente')
                    ->relationship(
                        name: 'cliente',
                        titleAttribute: 'nombre',
                    )
                    ->getOptionLabelFromRecordUsing(
                        fn (Cliente $record): string => trim(
                            "{$record->nombre} {$record->primer_apellido} {$record->segundo_apellido}"
                        )
                    )
                    ->searchable([
                        'nombre',
                        'primer_apellido',
                        'segundo_apellido',
                    ])
                    ->preload()
                    ->placeholder('Selecciona un cliente')
                    ->required(),

                Select::make('id_estado_pedido')
                    ->label('Estado del pedido')
                    ->relationship(
                        name: 'estado',
                        titleAttribute: 'tipo',
                    )
                    ->searchable()
                    ->preload()
                    ->placeholder('Selecciona un estado')
                    ->required(),
            ])
            ->columns(2);
    }
}