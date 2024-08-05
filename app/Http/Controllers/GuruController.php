<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = User::whereHas('role', function ($query) {
            $query->where('role', 'guru');
        })->get();

        return view('app.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('app.guru.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $guruRole = Role::where('role', 'guru')->first();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $guruRole->id,
        ]);

        return redirect()->route('gurus.index')->with('success', 'guru created successfully.');
    }

    public function edit(User $guru)
    {
        return view('app.guru.edit', compact('guru'));
    }

    public function update(Request $request, User $guru)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $guru->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $guru->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $guru->password,
        ]);

        return redirect()->route('gurus.index')->with('success', 'guru updated successfully.');
    }

    public function destroy(User $guru)
    {
        $guru->delete();
        return redirect()->route('gurus.index')->with('success', 'guru deleted successfully.');
    }
}
