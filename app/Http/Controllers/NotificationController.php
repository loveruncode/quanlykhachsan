<?php

namespace App\Http\Controllers;

use App\Datatables\NotifyDatatable;
use App\Enum\NotifyStatus;
use App\Models\Notification;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NotificationRequest;
use App\Services\Notify\NotificationServiceInterface;
use App\Repository\Notification\NotificationRepositoryInterface;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $repository;
    protected $service;
    public function __construct(
        NotificationRepositoryInterface $repository,
        NotificationServiceInterface $service

    ) {
        $this->repository = $repository;
        $this->service = $service;
    }


    public function index()
    {
            $data = $this->repository->show();
         return view('notification.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status  = NotifyStatus::asSelectArray();
        return view('notification.create', ['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
        $validatedData = $request->validated();

        $kq = $this->repository->create($validatedData);

        if (!$kq) {

            return back()->with('error', 'Thêm thông Báo Thất Bại');
        }
        return back()->with('success', 'Thêm thông báo thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $result = $this->repository->delete($id);
        if(!$result){

             return back()->with('error', 'Xoá Thông Báo Thất Bại');
        }
        return back()->with('success', 'Xoá Thông báo thành công');
    }

    public function search(Request $request){


      

    }
}
