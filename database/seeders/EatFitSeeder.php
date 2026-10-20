<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\DetallePedido;
use App\Models\EstadoPedido;
use App\Models\Inventario;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EatFitSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // Estados disponibles para los pedidos.
            $estados = [];

            foreach (['recibido', 'en preparación', 'listo', 'entregado'] as $tipo) {
                $estados[$tipo] = EstadoPedido::firstOrCreate([
                    'tipo' => $tipo,
                ]);
            }

            // Clientes ficticios.
            $clientes = [];

            foreach ([
                ['nombre' => 'Ana', 'primer_apellido' => 'Lopez', 'segundo_apellido' => 'Garcia'],
                ['nombre' => 'Luis', 'primer_apellido' => 'Perez', 'segundo_apellido' => 'Torres'],
                ['nombre' => 'Sofia', 'primer_apellido' => 'Ramirez', 'segundo_apellido' => 'Cruz'],
            ] as $datos) {
                $clientes[] = Cliente::firstOrCreate($datos);
            }

            // Productos y existencias de ejemplo.
            $productos = [];

            $catalogo = [
                ['nombre_producto' => 'Bowl de pollo', 'precio' => '95.00', 'existencia' => 20],
                ['nombre_producto' => 'Ensalada verde', 'precio' => '65.00', 'existencia' => 15],
                ['nombre_producto' => 'Wrap de atun', 'precio' => '75.00', 'existencia' => 18],
                ['nombre_producto' => 'Agua de limon', 'precio' => '25.00', 'existencia' => 30],
            ];

            foreach ($catalogo as $datos) {
                $producto = Producto::updateOrCreate(
                    ['nombre_producto' => $datos['nombre_producto']],
                    ['precio' => $datos['precio']]
                );

                Inventario::firstOrCreate(
                    ['id_producto' => $producto->getKey()],
                    ['existencia' => $datos['existencia']]
                );

                $productos[] = $producto;
            }

            // Cada detalle indica el índice del producto y su cantidad.
            $pedidos = [
                [
                    'nombre' => 'DEMO-001',
                    'cliente' => 0,
                    'estado' => 'recibido',
                    'detalles' => [[0, 2], [3, 2]],
                ],
                [
                    'nombre' => 'DEMO-002',
                    'cliente' => 1,
                    'estado' => 'en preparación',
                    'detalles' => [[1, 1], [2, 1]],
                ],
                [
                    'nombre' => 'DEMO-003',
                    'cliente' => 2,
                    'estado' => 'listo',
                    'detalles' => [[0, 1], [3, 1]],
                ],
                [
                    'nombre' => 'DEMO-004',
                    'cliente' => 0,
                    'estado' => 'entregado',
                    'detalles' => [[1, 2], [3, 2]],
                ],
            ];

            foreach ($pedidos as $datos) {
                $pedido = Pedido::updateOrCreate(
                    ['nombre_pedido' => $datos['nombre']],
                    [
                        'id_cliente' => $clientes[$datos['cliente']]->getKey(),
                        'id_estado_pedido' => $estados[$datos['estado']]->getKey(),
                    ]
                );

                foreach ($datos['detalles'] as [$indiceProducto, $cantidad]) {
                    $producto = $productos[$indiceProducto];

                    DetallePedido::updateOrCreate(
                        [
                            'id_pedido' => $pedido->getKey(),
                            'id_producto' => $producto->getKey(),
                        ],
                        [
                            'cantidad' => $cantidad,
                            'precio_unitario' => $producto->precio,
                        ]
                    );
                }
            }
        });

        $this->command->info('Datos de prueba de Eat-Fit cargados correctamente.');
    }
}
