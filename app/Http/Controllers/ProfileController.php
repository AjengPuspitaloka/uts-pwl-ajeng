<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = DB::table('users')->where('username', session('username'))->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User tidak ditemukan.');
        }

        return view('profil.show', compact('user'));
    }

    public function edit()
    {
        $user = DB::table('users')->where('username', session('username'))->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User tidak ditemukan.');
        }

        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
     $request->validate([
    'name' => 'required|string|max:255', // gunakan 'name', bukan 'nama'
    'username' => 'required|string|max:255',
    'password' => 'nullable|min:4',
    'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);

$data = [
    'name' => $request->name, // gunakan 'name', bukan 'nama'
    'username' => $request->username,
];

       
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;

            session(['avatar' => $avatarName]);
        }

        DB::table('users')->where('username', session('username'))->update($data);

        // Update session
       session([
    'username' => $request->username,
    'name' => $request->name, // update 'name' ke sesi
]);


        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
