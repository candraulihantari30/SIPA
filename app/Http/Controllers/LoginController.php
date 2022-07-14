<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik'       => 'required|numeric|min:16',
            'password'  => 'required',
        ]);

        if (Auth::guard('krama')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/beranda')->with('success', 'Login Berhasil');
        } elseif (Auth::guard('prajuru')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login Berhasil');
        }

        return back()->with('loginError', 'Login Gagal! NIK atau password salah!');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('krama')->check()) {
            Auth::guard('krama')->logout();
            $request->session()->invalidate();
            $request->session()->regenerate();
            return redirect('/login')->with('success', 'Berhasi Logout');;
        } elseif (Auth::guard('prajuru')->check()) {
            Auth::guard('prajuru')->logout();
            $request->session()->invalidate();
            $request->session()->regenerate();
            return redirect('/login')->with('error', 'Berhasi Logout');
        }
    }
}
