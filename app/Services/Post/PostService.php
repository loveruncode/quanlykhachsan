<?php

namespace App\Services\Post;

use Illuminate\Http\Request;
use App\Services\Post\PostServiceInterface;
use App\Repository\Post\PostRepositoryInterface;




class PostService implements PostServiceInterface
{


    protected $repository;


    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function store(Request $request)
    {

        if (auth()->check()) {
            $validatedData = $request->validated();
            $imagePaths = [];
            $validatedData['user_id'] = auth()->user()->id;
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
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }

    public function getImagesFromString($imageString)
    {
        return explode(',', $imageString);
    }


    public function update($id, Request $request)
    {
    }

    public function delete($id)
    {
    }
}
