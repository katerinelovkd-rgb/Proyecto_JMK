<?php

namespace App\Filament\Admin\Resources\Productos\Pages;

use App\Filament\Admin\Resources\Productos\ProductoResource;
use Filament\Resources\Pages\EditRecord;

class EditProducto extends EditRecord
{
    protected static string $resource = ProductoResource::class;

    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'El producto se ha editado exitosamente';
    }

    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}