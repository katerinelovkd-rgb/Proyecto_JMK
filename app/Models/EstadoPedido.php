<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoPedido extends Model
{
    protected $table = 'estado_pedido';

    protected $primaryKey = 'id_estado_pedido';

    protected $fillable = [
        'tipo',
    ];

    // Varios pedidos pueden tener el mismo estado actual.
    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, 'id_estado_pedido', 'id_estado_pedido');
    }
}
