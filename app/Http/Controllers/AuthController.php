<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('logged_in')) {
            return redirect()->route(session('role') . '.dashboard');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,user'
        ]);

        $user = User::where('username', $request->username)
                    ->where('role', $request->role)
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'logged_in' => true,
                'role' => $user->role,
                'username' => $user->username,
                'name' => $user->name ?? $user->username, // fallback ke username
            ]);

            return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'pengaduan.index');
        }

        return back()->with('error', 'Username, password, atau role salah.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
            'role' => 'required|in:admin,user'
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            // 'name' => $request->name, // tambahkan jika form register pakai "name"
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
