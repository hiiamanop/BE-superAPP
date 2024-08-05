<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = User::whereHas('role', function ($query) {
            $query->where('role', 'siswa');
        })->get();

        return view('app.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('app.siswa.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $siswaRole = Role::where('role', 'siswa')->first();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $siswaRole->id,
        ]);

        return redirect()->route('siswas.index')->with('success', 'siswa created successfully.');
    }

    public function edit(User $siswa)
    {
        return view('app.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, User $siswa)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $siswa->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $siswa->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $siswa->password,
        ]);

        return redirect()->route('siswas.index')->with('success', 'siswa updated successfully.');
    }

    public function destroy(User $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswas.index')->with('success', 'siswa deleted successfully.');
    }
}
