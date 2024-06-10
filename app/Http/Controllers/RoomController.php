<?php

namespace App\Http\Controllers;

use App\Enum\Discount;
use App\Enum\RoomStatus;
use App\Http\Requests\RoomRequest;
use App\Repository\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $repository;

    public function __construct(RoomRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
        return view('room.create', compact('status', 'discount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $data = $request->validated();
       dd($data);
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
