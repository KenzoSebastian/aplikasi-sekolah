<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("auth.loginForm");
    }

    public function registerForm()
    {
        return view("auth.registerForm");
    }

    public function login(Request $request)
    {
        $validate = $request->validate(
            [
                "email" => ["required", "email"],
                "password" => ["required"],
            ],
            [
                "email.required" => "Email harus diisi",
                "email.email" => "Format email tidak valid",
                "password.required" => "Password harus diisi",
            ],
        );
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route("home");
        }
        return back()->withErrors(["error" => "Email atau password salah"]);
    }

    public function register(Request $request)
    {
        $validate = $request->validate(
            [
                "username" => ["required", "min:3"],
                "email" => ["required", "email"],
                "password" => ["required", "min:6"],
                "konfirmasiPassword" => ["required", "same:password"],
            ],
            [
                "username.required" => "Username harus diisi",
                "username.min" => "Username minimal 3 karakter",

                "email.required" => "Email harus diisi",
                "email.email" => "Format email tidak valid",

                "password.required" => "Password harus diisi",
                "password.min" => "Password minimal 6 karakter",

                "konfirmasiPassword.required" => "Konfirmasi password harus diisi",
                "konfirmasiPassword.same" => "Konfirmasi password tidak sama dengan password",
            ],
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
}
