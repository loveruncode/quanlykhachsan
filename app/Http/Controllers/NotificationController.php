<?php

namespace App\Http\Controllers;

use App\Enum\NotifyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NotificationRequest;
use App\Repository\Notification\NotificationRepositoryInterface;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $repository;

    public function __construct(NotificationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        return view('notification.index');
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
        $data = $request->validated();
        
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
