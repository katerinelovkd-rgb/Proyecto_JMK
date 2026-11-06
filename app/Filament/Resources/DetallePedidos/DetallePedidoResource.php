<?php

namespace App\Filament\Resources\DetallePedidos;

use App\Filament\Resources\DetallePedidos\Pages\CreateDetallePedido;
use App\Filament\Resources\DetallePedidos\Pages\EditDetallePedido;
use App\Filament\Resources\DetallePedidos\Pages\ListDetallePedidos;
use App\Filament\Resources\DetallePedidos\Pages\ViewDetallePedido;
use App\Filament\Resources\DetallePedidos\Schemas\DetallePedidoForm;
use App\Filament\Resources\DetallePedidos\Schemas\DetallePedidoInfolist;
use App\Filament\Resources\DetallePedidos\Tables\DetallePedidosTable;
use App\Models\DetallePedido;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetallePedidoResource extends Resource
{
    protected static ?string $model = DetallePedido::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id_detalle_pedido';

    public static function form(Schema $schema): Schema
    {
        return DetallePedidoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DetallePedidoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetallePedidosTable::configure($table);
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
            'index' => ListDetallePedidos::route('/'),
            'create' => CreateDetallePedido::route('/create'),
            'view' => ViewDetallePedido::route('/{record}'),
            'edit' => EditDetallePedido::route('/{record}/edit'),
        ];
    }
}
