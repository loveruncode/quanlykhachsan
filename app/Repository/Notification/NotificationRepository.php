<?php


namespace App\Repository\Notification;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use App\Repository\EloquentRepository;
use App\Repository\Notification\NotificationRepositoryInterface;

class NotificationRepository extends EloquentRepository implements NotificationRepositoryInterface
{


    public function getModel()
    {
        return Notification::class;
    }

    public function show(){
        return $this->model->orderBy('created_at', 'desc')->paginate(6);
    }

    public function attachUsers(Notification $notify, array $data)
    {
        return $notify->users()->attach($data);
    }

    public function count()
    {
        return DB::table('notifications')->count();
    }



    public function search($query){

        return $this->model->where('title', 'like', '%' . $query . '%')
        ->orWhere('desc', 'like', '%' . $query . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }







}
