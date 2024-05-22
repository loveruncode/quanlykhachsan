<?php


namespace App\Repository\Notification;

use App\Models\Notification;
use App\Repository\EloquentRepository;
use App\Repository\Notification\NotificationRepositoryInterface;

class NotificationRepository extends EloquentRepository implements NotificationRepositoryInterface{


    public function getModel()
    {
        return Notification::class;
    }

    public function attachUsers(Notification $notify, array $data)
    {
        return $notify->users()->attach($data);
    }



}
