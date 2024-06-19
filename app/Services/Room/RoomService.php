<?php


namespace App\Services\Room;

use App\Repository\Room\RoomRepositoryInterface;
use App\Services\Room\RoomServiceInterface;
use Illuminate\Http\Request;

class RoomService implements RoomServiceInterface
{
    protected $data;
    protected $repository;
    public function __construct(RoomRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validated();
        $imagePaths = [];
        if ($request->hasFile('pic')) {
            foreach ($request->file('pic') as $avatar) {
                $imageName = time() . '_' . $avatar->getClientOriginalName();
                $avatar->storeAs('public', $imageName);
                $imagePaths[] = $imageName;
            }
            $validatedData['pic'] = implode(',', $imagePaths);
        }

        $result = $this->repository->create($validatedData);
        return $result;
    }


    public function update($id,Request $request)
    {

        $validatedData = $request->validated();

        $imagePaths = [];
        if ($request->hasFile('pic')) {
            foreach ($request->file('pic') as $avatar) {
                $imageName = time() . '_' . $avatar->getClientOriginalName();
                $avatar->storeAs('public', $imageName);
                $imagePaths[] = $imageName;
            }
            $validatedData['pic'] = implode(',', $imagePaths);
        }
        $result = $this->repository->update($id, $validatedData);

        return $result;
    }


    public function delete($id)
    {
    }
}
