<?php

namespace App\Repositories;

// use Cart;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Pedido_producto;
use Darryldecode\Cart\Cart;
use App\Contracts\PedidoContract;

class PedidoRepository extends BaseRepository implements PedidoContract
{
    public function __construct(Pedido $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $order = Pedido::create([
            'order_number'      =>  'ORD-' . strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'notes'             =>  $params['notes']
        ]);

        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item) {
                // A better way will be to bring the producto id with the cart items
                // you can explore the package documentation to send producto id with the cart
                $producto = Producto::where('name', $item->name)->first();

                $orderItem = new Pedido_producto([
                    'producto_id'    =>  $producto->id,
                    'cantidad'      =>  $item->quantity,
                    'precio'         =>  $item->getPriceSum()
                ]);

                $order->items()->save($orderItem);
            }
        }

        return $order;
    }
}
