<?php


namespace App\Repository\Room;

use App\Models\Room;
use App\Repository\EloquentRepository;
use App\Repository\Room\RoomRepositoryInterface;

class RoomRepository extends EloquentRepository implements RoomRepositoryInterface{



    public function getModel()
    {
        return Room::class;
    }

    public function show(){
        return $this->model->orderBy('created_at', 'desc')->paginate(6);
    }


    public function search($query){

        return $this->model->where('code', 'like', '%' . $query . '%')
        ->orWhere('title', 'like', '%' . $query . '%')
        ->orWhere('total_price', 'like', '%' . $query . '%')
        ->orWhere('price_per_date', 'like', '%' . $query . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

}
