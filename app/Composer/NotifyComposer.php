<?php


namespace App\Composer;
use Illuminate\View\View;
use App\Repository\Notification\NotificationRepositoryInterface;

class NotifyComposer{

protected $repository;

public function __construct(NotificationRepositoryInterface $repository)
{
     $this->repository = $repository;
}

    public function compose(View $view){
        /// so luong thong bao
        $qty = $this->repository->count();
        // data thong bao
        $notity = $this->repository->getAll();

        $view->with([
            'sl' => $qty,
            'notify' => $notity,

        ]);

    }



}
