<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use JWTAuth,Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $args = $request->all();
        return User::register($args);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return User::login($credentials);
    }

    public function user()
    {
        return User::user();
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
}
