<?php


namespace App\Services\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\User\UserServiceInterface;
use App\Repository\User\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validated();

        $imagePaths = [];
        if ($request->hasFile('avatar')) {
            foreach ($request->file('avatar') as $avatar) {
                $imageName = time() . '_' . $avatar->getClientOriginalName();
                $avatar->storeAs('public', $imageName);
                $imagePaths[] = $imageName;
            }
            $validatedData['avatar'] = implode(',', $imagePaths);
        }

        $result = $this->repository->create($validatedData);
        return $result;
    }


    public function update($id, Request $request)
    {
        $validatedData = $request->validated();

        $imagePaths = [];
        if ($request->hasFile('avatar')) {
            foreach ($request->file('avatar') as $avatar) {
                $imageName = time() . '_' . $avatar->getClientOriginalName();
                $avatar->storeAs('public', $imageName);
                $imagePaths[] = $imageName;
            }
            $validatedData['avatar'] = implode(',', $imagePaths);
        }

        $user = $this->repository->find($id);
        if (empty($validatedData['password'])) {
            $validatedData['password'] = $user->password;
        } else {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $result = $this->repository->update($id, $validatedData);

        return $result;
    }



    public function delete($id)
    {
        $user = $this->repository->find($id);

        if ($user) {

            if ($user->avatar) {
                $imagePaths = explode(',', $user->avatar);
                foreach ($imagePaths as $imagePath) {
                    Storage::delete('public/' . $imagePath);
                }
            }
            $kq =  $this->repository->delete($id);
            return $kq;
        }

        return $user;
    }
}
