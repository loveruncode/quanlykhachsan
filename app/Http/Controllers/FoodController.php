<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Repository\Food\FoodRepositoryInterface;
use App\Services\Food\FoodServiceInterface;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    protected $service;
    protected $repository;

    public function __construct(FoodServiceInterface $service,
    FoodRepositoryInterface $repository
    )
    {
         $this->service = $service;
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $food = $this->repository->show();

        return view('food.index', compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        $response = $this->service->store($request);
        if (!$response) {

            return back()->with('error', 'Thêm Món Ăn Thất Bại!');
        }
        return back()->with('success', 'Thêm Món Ăn Thành Công!');


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
    public function edit($id)
    {
        $data = $this->repository->find($id);
        return view('food.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request)
    {

        $id = request('id');
        $result = $this->service->update($id,$request);
        if(!$result){
            return back()->with('error', 'Chỉnh Sửa Thất Bại!');
        }
        return redirect()->route('food.index')->with('success','Đã Chỉnh Sửa Thành Công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $result = $this->repository->delete($id);
        if(!$result){

             return back()->with('error', 'Xoá Món Ăn Thất Bại');
        }
        return back()->with('success', 'Xoá Món Ăn thành công');
    }

    public function search(Request $request){


        $query = $request->searchData;
        $food = $this->repository->search($query);
        return view('food.index', compact('food'));
    }
}
