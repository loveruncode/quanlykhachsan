<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\User\UserRepositoryInterface;

class UserApiController extends Controller
{


    protected $repository;


    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function index(){

        $user = $this->repository->getAll();

        return response()->json($user, 200);

    }
}
