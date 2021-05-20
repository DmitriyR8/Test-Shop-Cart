<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * CartController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->session()->exists('product')) {
            $productsInCart = $request->session()->get('product');

            $totalPrice = 0;
            $products = $this->productRepository->getProductByIds(array_keys($productsInCart));
            foreach ($products as $product) {
                $product->price = round($product->price * $productsInCart[$product->id], 2);
                $totalPrice += $product->price;
                $product->total = $productsInCart[$product->id];
            }
            $request->session()->put('totalPrice', $totalPrice);
        } else {
            $totalPrice = 0;
            $request->session()->put('totalPrice', $totalPrice);
            $products = [];
        }

        $totalPrice = round($request->session()->get('totalPrice'), 2);

        return view('cart.content', compact(['products', 'totalPrice']));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addToCart(Request $request)
    {
        $id = (int)$request->get('id');
        $allProducts = $request->session()->get('product');

        if(!$allProducts) {
            $request->session()->put('product', [$id => 1]);
        } else {
            $isNewProduct = true;
            foreach ($allProducts as $productId => $total) {
               if($productId == $id) {
                   $allProducts[$productId] = $total + 1;

                   $isNewProduct = false;
                   break;

               }
            }

            if($isNewProduct) {
                $allProducts[$id] = 1;
            }

            $request->session()->put('product', $allProducts);
        }

        return response()->json([
            'data' => $request->session()->get('product'),
            'status' => Response::HTTP_OK,
        ]);

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function removeProductFromCart(Request $request)
    {
        $id = (int)$request->get('id');
        $productsInCart = $request->session()->get('product') ?? [];

        if(array_key_exists($id, $productsInCart)) {
            $productTotal = $productsInCart[$id];

            if($productTotal > 1) {
                $productsInCart[$id] -= 1;
            } else {
                unset($productsInCart[$id]);
            }

            $request->session()->put('product', $productsInCart);
        }

        return response()->json([
            'data' => $productsInCart,
            'status' => Response::HTTP_OK,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function trash(Request $request)
    {
        $id = (int)$request->get('id');
        $productsInCart = $request->session()->get('product') ?? [];

        if(array_key_exists($id, $productsInCart)) {
            unset($productsInCart[$id]);
            $request->session()->put('product', $productsInCart);
        }

        return response()->json([
            'data' => $productsInCart,
            'status' => Response::HTTP_OK,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function clearCart(Request $request)
    {
        $request->session()->remove('product');
        $request->session()->remove('totalPrice');

        return response()->json([
            'message' => 'Cart has been successfully cleared.',
            'status' => Response::HTTP_OK,
        ]);
    }

    /**
     * @param Request $request
     * @return int
     */
    public function getTotalProducts(Request $request) {
        if ($request->session()->exists('product')) {
            $productsInCart = $request->session()->get('product');

            return count($productsInCart);
        }

        return 0;

    }
}
