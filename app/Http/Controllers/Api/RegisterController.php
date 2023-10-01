<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index()
    {
        return 'форма регистрации';
    }

    public function store(Request $request)
    {

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('Apishop')->accessToken;
        return response()->json(['user_token' => $token->token], 200);
        

    
    }
}