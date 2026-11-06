<?php

namespace App\Filament\Resources\EstadoPedidos\Pages;

use App\Filament\Resources\EstadoPedidos\EstadoPedidoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEstadoPedidos extends ListRecords
{
    protected static string $resource = EstadoPedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
