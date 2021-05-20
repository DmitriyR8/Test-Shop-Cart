<?php

namespace App\Repositories\Eloquent;

use App\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;

/**
 * Class AddressRepository
 * @package App\Repositories\Eloquent
 */
class AddressRepository implements AddressRepositoryInterface
{
    /**
     * @var Address
     */
    private $address;

    /**
     * AddressRepository constructor.
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }


    /**
     * @param $input
     * @param $user
     * @return mixed
     */
    public function createAddress($input, $user)
    {
        return $this->address->create([
            'user_id' => $user->id,
            'address' => $input['address'],
        ]);
    }
}
