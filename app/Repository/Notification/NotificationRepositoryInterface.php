<?php


namespace App\Repository\Notification;

use App\Models\Notification;
use App\Repository\EloquentRepositoryInterface;

interface NotificationRepositoryInterface extends EloquentRepositoryInterface{


    public function attachUsers(Notification $notify, array $data);
    public function count();
    public function show();
    public function search($query);

}
