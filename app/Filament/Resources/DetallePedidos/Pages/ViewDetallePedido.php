<?php

namespace App\Filament\Resources\DetallePedidos\Pages;

use App\Filament\Resources\DetallePedidos\DetallePedidoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDetallePedido extends ViewRecord
{
    protected static string $resource = DetallePedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
