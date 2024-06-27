<?php


namespace App\Repository\Post;

use App\Models\Post;
use App\Repository\EloquentRepository;
use App\Repository\Post\PostRepositoryInterface;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {

        return Post::class;
    }

    public function show(){
        return $this->model->orderBy('created_at', 'desc')->paginate(6);
    }


    public function search($query){

        return $this->model->where('title', 'like', '%' . $query . '%')
        ->orWhere('desc', 'like', '%' . $query . '%')
        ->orWhere('status', 'like', '%' . $query . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }


}
