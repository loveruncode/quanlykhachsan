<?php



namespace App\Services\Notify;

use App\Repository\Notification\NotificationRepositoryInterface;
use App\Services\Notify\NotificationServiceInterface;
use Illuminate\Http\Request;

class NotificationService implements NotificationServiceInterface
{
    protected $data;

    protected $repository;

    public function __construct(NotificationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }





    public function store(Request $request)
    {
        

    }


    public function update($id, Request $request)
    {
    }

    public function delete($id)
    {

    }
}
