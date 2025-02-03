<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,user_email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,user_email,' . $user->id, // Pastikan email unik tapi tetap bisa digunakan oleh pemiliknya
        ]);

        $user->update([
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

    public function toggleStatus(User $user)
    {
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Status pengguna berhasil diubah');
    }
}
