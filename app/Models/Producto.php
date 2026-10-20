<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    protected $table = 'producto';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre_producto',
        'precio',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
    ];

    // Un producto puede aparecer en varios renglones de pedidos.
    public function detalles(): HasMany
    {
        return $this->hasMany(DetallePedido::class, 'id_producto', 'id_producto');
    }

    // Los pedidos y los productos se conectan mediante detalle_pedido.
    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(
            Pedido::class,
            'detalle_pedido',
            'id_producto',
            'id_pedido',
            'id_producto',
            'id_pedido'
        )->withPivot('id_detalle_pedido', 'cantidad', 'precio_unitario')
            ->withTimestamps();
    }

    // Propuesta 1:N para inventario. Consulta el supuesto en LEEME.md.
    public function inventarios(): HasMany
    {
        return $this->hasMany(Inventario::class, 'id_producto', 'id_producto');
    }
}
