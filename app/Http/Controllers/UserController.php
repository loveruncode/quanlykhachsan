<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return response()->json([
            'message' => 'Danh sách người dùng đã được trả về thành công.',
            'data' => $users
        ], 200);
    }

    public function login(){

        return view('login');
    }

    public function regester(){

        return view('register');
    }

    public function checklogin(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return view('dashboard.dashboard');
        } else {

            return redirect()->back()->withErrors(['message' => 'Invalid login credentials']);
        }

    }


    public function logout(Request $request){

        Auth::logout();
        return redirect('login');
    }
}
