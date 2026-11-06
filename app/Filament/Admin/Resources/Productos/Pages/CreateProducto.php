<?php

namespace App\Filament\Admin\Resources\Productos\Pages;

use App\Filament\Admin\Resources\Productos\ProductoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProducto extends CreateRecord
{
    protected static string $resource = ProductoResource::class;

   
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'El producto se ha creado exitosamente';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}