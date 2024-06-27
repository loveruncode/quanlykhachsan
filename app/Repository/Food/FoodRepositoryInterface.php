<?php

namespace App\Repository\Food;

use App\Repository\EloquentRepositoryInterface;

interface FoodRepositoryInterface extends EloquentRepositoryInterface{


    public function show();
    public function search($query);
}
