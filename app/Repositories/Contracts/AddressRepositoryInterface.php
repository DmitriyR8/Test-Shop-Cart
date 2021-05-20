<?php

namespace App\Repositories\Contracts;
/**
 * Interface AddressRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface AddressRepositoryInterface
{
    /**
     * @param $input
     * @param $user
     * @return mixed
     */
    public function createAddress($input, $user);
}
