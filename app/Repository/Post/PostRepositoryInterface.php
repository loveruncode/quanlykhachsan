<?php

namespace  App\Repository\Post;

use App\Repository\EloquentRepositoryInterface;

interface PostRepositoryInterface extends EloquentRepositoryInterface{


    public function show();
    public function search($query);
}
