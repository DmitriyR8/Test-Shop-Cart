<?php

namespace App\Repositories\Contracts;
/**
 * Interface OrderRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface OrderRepositoryInterface
{
    /**
     * @param $product
     * @param $user
     * @param $shipping
     * @param $totalPrice
     * @return mixed
     */
    public function createOrder($product, $user, $shipping, $totalPrice);
}
