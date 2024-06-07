<?php

namespace App\Composer;


use Illuminate\View\View;
use App\Repository\User\UserRepositoryInterface;

class UserComposer {


    protected $repository;


    public function __construct(UserRepositoryInterface $repository)
    {
         $this->repository = $repository;
    }


    public function compose(View $view){

        $userid = auth()->user()->id;
        $authUser = $this->repository->find($userid);



        $view->with([
            'user' => $authUser
        ]);

    }




}
