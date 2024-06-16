<?php


namespace App\Repository\Room;

use App\Repository\EloquentRepositoryInterface;

interface RoomRepositoryInterface extends EloquentRepositoryInterface{


    public function show();
    public function search($query);
}
