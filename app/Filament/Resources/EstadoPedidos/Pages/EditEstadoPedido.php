<?php

namespace App\Filament\Resources\EstadoPedidos\Pages;

use App\Filament\Resources\EstadoPedidos\EstadoPedidoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEstadoPedido extends EditRecord
{
    protected static string $resource = EstadoPedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
