<?php

namespace App\Filament\Resources\Pedidos\Pages;

use App\Filament\Resources\Pedidos\PedidoResource;
use App\Models\Pedido;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPedido extends EditRecord
{
    protected static string $resource = PedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                ->label('Ver'),

            DeleteAction::make()
                ->label('Eliminar')
                ->requiresConfirmation()
                ->before(function (DeleteAction $action, Pedido $record): void {
                    if ($record->detalles()->exists()) {
                        Notification::make()
                            ->title('El pedido tiene detalles')
                            ->body(
                                'Elimina primero sus detalles para poder eliminar el pedido.'
                            )
                            ->warning()
                            ->send();

                        $action->halt();
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

