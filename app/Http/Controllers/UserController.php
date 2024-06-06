<?php

namespace App\Http\Controllers;

use App\Enum\Gender;
use App\Enum\UserRoles;
use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Prime\Notification\Type;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;



class UserController extends Controller
{


    public function index()
    {
        return view('user.index');
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

        $data = $request->validated();
        dd($data);

     }




    public function logout(Request $request)
    {

        Auth::logout();
        return view('login');
    }






}
