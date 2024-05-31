<?php



namespace App\Services\Notify;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Notify\NotificationServiceInterface;
use App\Repository\Notification\NotificationRepositoryInterface;

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

        $this->data = $request->validated();

        if (!isset($this->data['user_id'])) {
            return response()->json(['error' => 'user_id not found'], 400);
        }
        $usersid = $this->data['user_id'];
        $notify = $this->repository->create($this->data);
        $this->repository->attachUsers($notify, $usersid);
        return response()->json($notify, 201);
    }



    public function update($id, Request $request)
    {
    }

    public function delete($id)
    {
    }
}
