<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return match ($user->role_id) {
                1 => redirect()->intended('/admin'),
                2 => redirect()->intended('/sekre'),
                3 => redirect()->intended('/kasubag'),
                default => redirect()->intended('/staff'),
            };
        }

//        throw ValidationException::withMessages([
//            'email' => ['The provided credentials do not match our records.'],
//        ]);

        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with(['success' => 'Berhasil Logout!']);
    }
}
