<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JWTAuth,Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function register($args){
        $user = new User;
        $user->email = $args['email'];
        $user->name = $args['name'];
        $user->password = bcrypt($args['password']);
        $user->save();
        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public static function login($credentials){
        if ( ! $token = JWTAuth::attempt($credentials)) {
            $errors['errors'] = ['邮箱或密码不正确'];
            return response()->json(['code' => 1,'errors' => $errors],400);
        }
        return response(['status' => 'success'])
            ->header('Authorization', $token)->header("Access-Control-Expose-Headers","Authorization");
    }

    public static function user(){
        $user = User::find(Auth::user()->id);
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }
}
