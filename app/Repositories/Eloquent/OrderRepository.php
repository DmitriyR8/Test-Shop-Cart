<?php

namespace App\Repositories\Eloquent;

use App\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
/**
 * Class OrderRepository
 * @package App\Repositories\Eloquent
 */
class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var Order
     */
    private $order;

    /**
     * OrderRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param $product
     * @param $user
     * @param $shipping
     * @param $totalPrice
     * @return mixed
     */
    public function createOrder($product, $user, $shipping, $totalPrice)
    {
        foreach ($product as $id => $total) {
            $this->order->create([
            'product_id' => $id,
            'user_id' => $user->id,
            'shipping_id' => $shipping,
            'total_price' => $totalPrice,
            ]);
        }
    }
}
