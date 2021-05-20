<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ShippingRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class ShippingController
 * @package App\Http\Controllers
 */
class ShippingController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepository;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var ShippingRepositoryInterface
     */
    private $shippingRepository;

    /**
     * ShippingController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param AddressRepositoryInterface $addressRepository
     * @param OrderRepositoryInterface $orderRepository
     * @param ShippingRepositoryInterface $shippingRepository
     */
    public function __construct
    (
        UserRepositoryInterface $userRepository,
        AddressRepositoryInterface $addressRepository,
        OrderRepositoryInterface $orderRepository,
        ShippingRepositoryInterface $shippingRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->orderRepository = $orderRepository;
        $this->shippingRepository = $shippingRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $shippings = $this->shippingRepository->getAllShippings();

        foreach ($shippings as $shipping) {
            $shippingPrice = $shipping->price;
        }

        if ($request->session()->exists('totalPrice')) {
            $totalPrice = round($request->session()->get('totalPrice') , 2);
        } else {
            $totalPrice = 0;
        }

        return view('shipping.content', compact(['shippings', 'totalPrice', 'shippingPrice']));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'phone' => 'required',
            'shipping_id' => 'required|exists:shippings,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }

        $userCreate = $this->userRepository->createUser($input);

        $addressCreate = $this->addressRepository->createAddress($input, $userCreate);

        $products = $request->session()->get('product');

        $totalPrice = $request->session()->get('totalPrice');

        $shippings = $this->shippingRepository->getShippingById($input['shipping_id']);

        foreach ($shippings as $shipping) {
            $shippingId = $shipping->id;
        }

        $orderCreate = $this->orderRepository->createOrder($products, $userCreate, $shippingId, $totalPrice);

        return response()->json([
            'data' => $orderCreate,
            'message' => 'Order successfully processed.',
            'status' => Response::HTTP_OK,
        ]);
    }
}
