<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @param $input
     * @return mixed
     */
    public function createUser($input)
    {
        return $this->user->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone']
        ]);
    }
}
