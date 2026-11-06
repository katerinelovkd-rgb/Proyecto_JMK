<?php

namespace App\Filament\Admin\Resources\Inventarios\Pages;

use App\Filament\Admin\Resources\Inventarios\InventarioResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInventario extends ViewRecord
{
    protected static string $resource = InventarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
