<?php

namespace App\Services\Post;

use Illuminate\Http\Request;
use App\Services\Post\PostServiceInterface;
use App\Repository\Post\PostRepositoryInterface;




class PostService implements PostServiceInterface{


    protected $repository;


    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function store(Request $request)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function delete($id)
    {
        
    }





}
