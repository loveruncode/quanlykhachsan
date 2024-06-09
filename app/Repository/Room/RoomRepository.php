<?php


namespace App\Repository\Room;

use App\Models\Room;
use App\Repository\EloquentRepository;
use App\Repository\EloquentRepositoryInterface;

class RoomRepository extends EloquentRepository implements EloquentRepositoryInterface{



    public function getModel()
    {
        return Room::class;
    }

    

}
