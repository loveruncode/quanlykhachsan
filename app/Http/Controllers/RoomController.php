<?php

namespace App\Http\Controllers;

use App\Enum\Discount;
use App\Enum\RoomStatus;
use App\Enum\TypeRoom;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Validator;
use App\Repository\Room\RoomRepositoryInterface;
use App\Services\Room\RoomService;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $repository;
    protected $service;

    public function __construct(
        RoomRepositoryInterface $repository,
        RoomService $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }


    public function index()
    {


        return view('room.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $status = RoomStatus::asSelectArray();
        $discount = Discount::asSelectArray();
        $type = TypeRoom::asSelectArray();
        return view('room.create', compact('status', 'discount','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {

        $response = $this->service->store($request);
        if (!$response) {

            return back()->with('error', 'Thêm Phòng Thất Bại!');
        }
        return back()->with('success', 'Thêm Phòng Thành Công!');
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
