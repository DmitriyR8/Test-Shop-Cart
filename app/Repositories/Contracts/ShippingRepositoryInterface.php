<?php

namespace App\Repositories\Contracts;
/**
 * Interface ShippingRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface ShippingRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getShippingById($id);

    /**
     * @return mixed
     */
    public function getAllShippings();
}
