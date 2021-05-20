<?php

namespace App\Repositories\Contracts;
/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface UserRepositoryInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function createUser($input);
}
