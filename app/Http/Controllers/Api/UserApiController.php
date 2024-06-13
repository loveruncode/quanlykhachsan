<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }



}
