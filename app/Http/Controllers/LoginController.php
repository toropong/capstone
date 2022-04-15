<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials  = $request->validate([
            'user_id' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            //로그인 성공
            return '{"success": true, "user_name": "' . Auth::user()->name . '"}';
        } else {
            //로그인 실패
            return '{"success": false}';
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
}
