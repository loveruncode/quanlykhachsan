<?php



namespace App\Repository\User;

use App\Repository\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface{



    public function search($query);
    public function show();

}
