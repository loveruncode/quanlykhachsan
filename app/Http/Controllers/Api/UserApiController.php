<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repository\User\UserRepositoryInterface;

class UserApiController extends Controller
{


    protected $repository;


    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {

        $user = $this->repository->getAll();

        return response()->json($user, 200);
    }


    public function checklogin(Request $request)
    {
        if (!$request->has('email') || !$request->has('password')) {
            return response()->json(['error' => 'Email and password are required'], 400);
        }

        if (!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            return response()->json(['error' => 'Invalid email format'], 400);
        }
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Sai Tài Khoản Mật Khâu'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }


    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // Return success response
            return response()->json(['message' => 'Đăng ký thành công'], 201);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['error' => 'Đăng ký thất bại'], 500);
        }
    }
}
