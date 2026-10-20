<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $primaryKey = 'id_inventario';

    protected $fillable = [
        'id_producto',
        'existencia',
    ];

    protected $casts = [
        'existencia' => 'integer',
    ];

    // Cada registro de inventario corresponde a un producto.
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
