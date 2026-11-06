<?php

namespace App\Filament\Admin\Resources\Inventarios;

use App\Filament\Admin\Resources\Inventarios\Pages\CreateInventario;
use App\Filament\Admin\Resources\Inventarios\Pages\EditInventario;
use App\Filament\Admin\Resources\Inventarios\Pages\ListInventarios;
use App\Filament\Admin\Resources\Inventarios\Pages\ViewInventario;
use App\Filament\Admin\Resources\Inventarios\Schemas\InventarioForm;
use App\Filament\Admin\Resources\Inventarios\Schemas\InventarioInfolist;
use App\Filament\Admin\Resources\Inventarios\Tables\InventariosTable;
use App\Models\Inventario;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InventarioResource extends Resource
{
    protected static ?string $model = Inventario::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    
    protected static ?string $navigationLabel = 'Inventarios';

    protected static ?string $recordTitleAttribute = 'id_inventario';

    public static function form(Schema $schema): Schema
    {
        return InventarioForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InventarioInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InventariosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInventarios::route('/'),
            'create' => CreateInventario::route('/create'),
            'view' => ViewInventario::route('/{record}'),
            'edit' => EditInventario::route('/{record}/edit'),
        ];
    }
}