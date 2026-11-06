<?php

namespace App\Filament\Admin\Resources\Productos;

use App\Filament\Admin\Resources\Productos\Pages\CreateProducto;
use App\Filament\Admin\Resources\Productos\Pages\EditProducto;
use App\Filament\Admin\Resources\Productos\Pages\ListProductos;
use App\Filament\Admin\Resources\Productos\Pages\ViewProducto;
use App\Filament\Admin\Resources\Productos\Schemas\ProductoForm;
use App\Filament\Admin\Resources\Productos\Schemas\ProductoInfolist;
use App\Filament\Admin\Resources\Productos\Tables\ProductosTable;
use App\Models\Producto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Productos';

    protected static ?string $recordTitleAttribute = 'nombre_producto';

    public static function form(Schema $schema): Schema
    {
        return ProductoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProductoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductosTable::configure($table);
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
            'index' => ListProductos::route('/'),
            'create' => CreateProducto::route('/create'),
            'view' => ViewProducto::route('/{record}'),
            'edit' => EditProducto::route('/{record}/edit'),
        ];
    }
}