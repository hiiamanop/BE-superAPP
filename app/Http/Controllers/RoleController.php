<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('app.role.index', compact('roles'));
    }

    public function create()
    {
        return view('app.role.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')
                         ->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('app.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required|string|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')
                         ->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
                         ->with('success', 'Role deleted successfully.');
    }
}
