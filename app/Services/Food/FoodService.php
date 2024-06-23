<?php


namespace App\Services\Food;

use App\Repository\Food\FoodRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\Food\FoodServiceInterface;


class FoodService implements FoodServiceInterface{

    protected $repository;

    public function __construct(FoodRepositoryInterface $repository)
    {
         $this->repository = $repository;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validated();
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $avatar) {
                $imageName = time() . '_' . $avatar->getClientOriginalName();
                $avatar->storeAs('public', $imageName);
                $imagePaths[] = $imageName;
            }
            $validatedData['image'] = implode(',', $imagePaths);
        }

        $result = $this->repository->create($validatedData);
        return $result;
    }


    public function update($id, Request $request)
    {


    }

    public function delete($id)
    {

    }


}
