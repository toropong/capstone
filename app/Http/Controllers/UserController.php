<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showPasswordChangeForm(Request $request)
    {
        return view('passwordchange');
    }

    public function changePassword(Request $request)
    {
        $request->validate($this->passwordValidation($request));
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);
        // $request->session()->forget('auth.password_confirmed_at');
        return redirect()->route('main');
    }

    protected function passwordValidation(Request $request)
    {
        return [
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ];
    }
}
