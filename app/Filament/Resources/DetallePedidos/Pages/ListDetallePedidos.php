<?php

namespace App\Filament\Resources\DetallePedidos\Pages;

use App\Filament\Resources\DetallePedidos\DetallePedidoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetallePedidos extends ListRecords
{
    protected static string $resource = DetallePedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
