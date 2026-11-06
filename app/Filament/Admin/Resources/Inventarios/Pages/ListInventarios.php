<?php

namespace App\Filament\Admin\Resources\Inventarios\Pages;

use App\Filament\Admin\Resources\Inventarios\InventarioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInventarios extends ListRecords
{
    protected static string $resource = InventarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
