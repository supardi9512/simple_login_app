<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AppController extends Controller
{

    public function init()
    {
        $this->middleware('auth');
        $user = Auth::user();

        return response()->json(['user' => $user], 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], true))
        {
            return response()->json(Auth::user(), 200);
        } else {
            return response()->json(['error' => 'Username/Password yang Anda masukkan salah!'], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
    }
}
