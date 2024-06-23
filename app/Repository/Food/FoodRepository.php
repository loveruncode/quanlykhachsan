<?php


namespace App\Repository\Food;

use App\Models\Food;
use App\Repository\EloquentRepository;

class FoodRepository extends EloquentRepository implements FoodRepositoryInterface{


    public function getModel()
    {
        return Food::class;
    }

    public function show(){
        return $this->model->orderBy('created_at', 'desc')->paginate(6);
    }

}
