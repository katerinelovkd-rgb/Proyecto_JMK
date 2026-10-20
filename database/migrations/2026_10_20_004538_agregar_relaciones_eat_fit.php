<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pedido', function (Blueprint $table) {
            $table->foreignId('id_cliente')
                ->constrained('cliente', 'id_cliente')
                ->restrictOnDelete();

            $table->foreignId('id_estado_pedido')
                ->constrained('estado_pedido', 'id_estado_pedido')
                ->restrictOnDelete();
        });

        Schema::table('detalle_pedido', function (Blueprint $table) {
            $table->foreignId('id_pedido')
                ->constrained('pedido', 'id_pedido')
                ->restrictOnDelete();

            $table->foreignId('id_producto')
                ->constrained('producto', 'id_producto')
                ->restrictOnDelete();
        });

        Schema::table('inventario', function (Blueprint $table) {
            $table->foreignId('id_producto')
                ->constrained('producto', 'id_producto')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('inventario', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_producto');
        });

        Schema::table('detalle_pedido', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_producto');
            $table->dropConstrainedForeignId('id_pedido');
        });

        Schema::table('pedido', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_estado_pedido');
            $table->dropConstrainedForeignId('id_cliente');
        });
    }
};