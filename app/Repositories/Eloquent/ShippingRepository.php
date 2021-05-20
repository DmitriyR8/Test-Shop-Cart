<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ShippingRepositoryInterface;
use App\Shipping;

/**
 * Class ShippingRepository
 * @package App\Repositories\Contracts
 */
class ShippingRepository implements ShippingRepositoryInterface
{
    /**
     * @var Shipping
     */
    private $shipping;

    /**
     * ShippingRepository constructor.
     * @param Shipping $shipping
     */
    public function __construct(Shipping $shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getShippingById($id)
    {
        return $this->shipping->where('id', $id)->get();
    }

    /**
     * @return mixed
     */
    public function getAllShippings()
    {
        return $this->shipping->all();
    }
}
