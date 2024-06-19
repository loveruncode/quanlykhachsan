<?php

namespace App\Http\Controllers;

use App\Enum\Gender;
use App\Enum\UserRoles;
use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Prime\Notification\Type;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Repository\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;

class UserController extends Controller
{

    protected $repository;
    protected $service;
    public function __construct(UserRepositoryInterface $repository, UserServiceInterface $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }




    public function index()
    {


        $data = $this->repository->show();
        return view('user.index', compact('data'));
    }

    public function create(){


        $gender = Gender::asSelectArray();
        $roles = UserRoles::asSelectArray();
        return view('user.create', compact('gender','roles'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {

        return view('register');
    }

    public function update($id, UserRequest $request){

        $id = request('id');
        $respone = $this->service->update($id,$request);
        if($respone){
            return back()->with('success', __('Đã Cập Nhật Thành Công'));
        }
        return back()->with('error', __('Đã Cập Nhật Thất Bại'));
    }


    public function checklogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            if ($user->roles == 1) {
                return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
            } elseif ($user->roles == 2) {
               return view('public.home');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Vai trò không hợp lệ');
            }
        } else {
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }
    }

     public function store(UserRequest $request){

       $response = $this->service->store($request);
        if(!$response){

            return back()->with('error', 'Thêm Thành Viên Thất Bại!');
        }
        return back()->with('success', 'Thêm Thanh Viên Thành Công!');


     }

     public function delete($id){

        $result = $this->service->delete($id);

        if(!$result){
            return back()->with('error', 'Xoá Dữ Liệu Thất Bại!');
        }

        return back()->with('success', 'Xoá Thành Viên Thành Công!');

     }

     public function search(Request $request){

        $query = $request->searchData;
        $data = $this->repository->search($query);
        return view('user.index', compact('data'));


     }

     public function edit($id){

        $data = $this->repository->find($id);
        $gender = Gender::asSelectArray();
        return view('user.edit', compact('data', 'gender'));

     }





    public function logout(Request $request)
    {

        Auth::logout();
        return view('login');
    }






}
