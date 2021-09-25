<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;

class LoginJwtController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = request(['email', 'password']);

        if(! $token = auth()->attempt($credenciais)) { 

            return response()->json(['error' => 'login errado'], 401);

        }
        return response()->json([
            'token' => $token
        ]);

    }
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Logout sucessso'
        ]);
    }
}
