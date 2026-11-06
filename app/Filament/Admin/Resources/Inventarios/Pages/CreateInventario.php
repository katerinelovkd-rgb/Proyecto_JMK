<?php

namespace App\Filament\Admin\Resources\Inventarios\Pages;

use App\Filament\Admin\Resources\Inventarios\InventarioResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInventario extends CreateRecord
{
    protected static string $resource = InventarioResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'El inventario se ha creado exitosamente';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}