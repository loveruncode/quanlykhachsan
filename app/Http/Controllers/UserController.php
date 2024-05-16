<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Prime\Notification\Type;
use Illuminate\Support\Facades\Auth;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Routing\Controllers\HasMiddleware;


class UserController extends Controller
{




    public function index()
    {
        $users = User::all(['id','name']);
        return response()->json([
            'message' => 'Danh sách người dùng đã được trả về thành công.',
            'data' => $users
        ], 200);
    }

    public function login()
    {

        return view('login');
    }

    public function regester()
    {

        return view('register');
    }

    public function checklogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
        } else {

            return redirect()->back()->withErrors(['message' => 'Invalid login credentials']);
        }
    }


    public function logout(Request $request)
    {

        Auth::logout();
        return view('login');
    }
}
