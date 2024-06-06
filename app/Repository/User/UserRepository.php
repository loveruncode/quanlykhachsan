<?php


namespace App\Repository\User;

use App\Models\User;
use App\Repository\EloquentRepository;
use App\Repository\User\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{



    public function getModel()
    {
        return User::class;
    }





}
