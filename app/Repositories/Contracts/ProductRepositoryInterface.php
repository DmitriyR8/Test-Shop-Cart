<?php

namespace App\Repositories\Contracts;
/**
 * Interface ProductRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface ProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getProducts();

    /**
     * @param $id
     * @return mixed
     */
    public function getProductById($id);

    /**
     * @param $ids
     * @return mixed
     */
    public function getProductByIds($ids);
}
