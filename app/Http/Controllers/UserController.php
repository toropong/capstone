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
        return '<pre>' . json_encode([$user, $request->session()->all()], JSON_PRETTY_PRINT) . '</pre>';
    }

    protected function passwordValidation(Request $request)
    {
        return [
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ];
    }
}
