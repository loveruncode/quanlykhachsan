<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Prime\Notification\Type;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{


    public function index()
    {
        
    }

    public function create(){

        return view('user.create');
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






    public function logout(Request $request)
    {

        Auth::logout();
        return view('login');
    }






}
