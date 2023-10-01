<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return 'стр логина';
    }

    public function store(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password]))
        {
            $user = Auth::user();
            $token = $user->createToken('Apishop')->accessToken;
            return response()->json(['token'=>$token->token], 200);
        }
        else
        {
            return response()->json(['error'=>'Unauthenticated'], 401);
        }
    }
}
