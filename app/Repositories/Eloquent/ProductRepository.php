<?php

namespace App\Repositories\Eloquent;

use App\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

/**
 * Class ProductRepository
 * @package App\Repositories\Eloquent
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->product->orderBy('created_at', 'desc')->paginate(Product::PAGINATE);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductById($id)
    {
        return $this->product->find($id);
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function getProductByIds($ids)
    {
        return $this->product->whereIn('id', $ids)->get();
    }
}
