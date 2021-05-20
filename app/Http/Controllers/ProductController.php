<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->getProducts();

        return view('products.content', compact(['products']));
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function getProducts()
    {
        $products = $this->productRepository->getProducts()->toArray();

        return [
            'currentPage' => $products['current_page'],
            'lastPage' => $products['last_page'],
            'data' => view('products.product-part', compact('products'))->render()
        ];
    }

    /**
     * @param $id
     * @return BinaryFileResponse
     */
    public function getImage($id)
    {
        $products = json_decode($this->productRepository->getProductById($id), true);

        $fileName = $products['img'];

        $file = storage_path("app/{$fileName}");
        $header = [
            'Content-Disposition' => 'inline; filename="'. $fileName .'"'
        ];

        return response()->file($file, $header);
    }
}
