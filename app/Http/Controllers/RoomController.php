<?php

namespace App\Http\Controllers;

use App\Enum\Discount;
use App\Enum\RatingScore;
use App\Enum\RoomStatus;
use App\Enum\TypeRoom;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
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
        $room = $this->repository->show();

        return view('room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $status = RoomStatus::asSelectArray();
        $discount = Discount::asSelectArray();
        $type = TypeRoom::asSelectArray();
        $rate = RatingScore::asSelectArray();
        return view('room.create', compact('status', 'discount','type', 'rate'));
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
        $data = $this->repository->find($id);
        $status = RoomStatus::asSelectArray();
        $type = TypeRoom::asSelectArray();
        $rating = RatingScore::asSelectArray();
        $discount = Discount::asSelectArray();
         return view('room.edit', compact('data', 'status', 'type', 'rating', 'discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,RoomRequest $request)
    {
        $id = request('id');
        $respone = $this->service->update($id,$request);
        if($respone){
            return back()->with('success', __('Đã Cập Nhật Thành Công'));
        }
        return back()->with('error', __('Đã Cập Nhật Thất Bại'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request){

        $query = $request->searchData;
        $room = $this->repository->search($query);
        return view('room.index', compact('room'));

    }
}
