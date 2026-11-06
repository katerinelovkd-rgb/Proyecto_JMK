<?php

namespace App\Filament\Admin\Resources\Productos\Pages;

use App\Filament\Admin\Resources\Productos\ProductoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProducto extends ViewRecord
{
    protected static string $resource = ProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
