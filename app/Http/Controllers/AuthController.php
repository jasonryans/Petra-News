<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba cek user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            // Kalau user tidak ditemukan atau password salah
            return back()->with('error', 'Email atau password salah');
        }

        // Kalau sukses login
        Auth::login($user);

        // Cek apakah user adalah admin
        if ($user->role === 'admin') {
            // Kalau user adalah admin
            return redirect()->route('admin.news.index');
        }

        // Kalau user bukan admin
        return redirect()->route('news.index');
    }
    

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Simpan ke database
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user'
        ]);

        // Setelah register, redirect ke login
        return redirect()->route('login')->with('success', 'Berhasil daftar! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}