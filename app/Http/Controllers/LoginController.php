<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function indexLogin() {
        return view('login.index');
    }

    public function login(Request $request) {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();

            return Redirect::route('admin.dashboard.index');
        }

        return Redirect::back()->with('errors', 'Username dan Password salah');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return Redirect::route('login');
    }
}
