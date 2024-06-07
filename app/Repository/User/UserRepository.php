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

    public function show(){
        return $this->model->orderBy('created_at', 'desc')->paginate(6);
    }

    public function search($query){

        return $this->model->where('name', 'like', '%' . $query . '%')
        ->orWhere('email', 'like', '%' . $query . '%')
        ->orWhere('roles', 'like', '%'. $query. '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }



}
