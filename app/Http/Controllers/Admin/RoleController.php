<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-role', 'edit-role', 'delete-role'])) {
            $roles = Role::all();
            return view('admin.main.roles.index', compact('roles'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to Role.');
        }

    }

    public function create()
    {
        if (auth()->user()->can('create-role')) {
            $permissions = Permission::all();
            return view('admin.main.roles.create', compact('permissions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to add role.');
        }
    }

    public function store(Request $request)
    {
        try {
            try {
                $validated = $request->validate([
                    'name' => [
                        'required',
                        Rule::unique('roles')->where('guard_name', 'web'),
                    ],
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()->with('error', 'The name is already taken.');
            }

            $permissions = $request->input('permissions', []);
            $role = Role::create($validated);
            $role->syncPermissions($permissions);

            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Please fill all the required fields or choose a unique role name.');
        }
    }

    public function edit(Role $role)
    {
        if ($role->name == 'super_admin') {
            return redirect()->back()->with('error', 'Cannot edit role Super Admin.');
        }

        if (auth()->user()->can('edit-role')) {
            $permissions = Permission::all();
            return view('admin.main.roles.edit', compact('role', 'permissions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit role.');
        }
    }

    public function update(Request $request, Role $role)
    {
        try {
            try {
                $validated = $request->validate([
                    'name' => [
                        'required',
                        Rule::unique('roles')->ignore($role->id),
                    ],
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()->with('error', 'The name is already taken.');
            }

            $role->update($validated);

            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Please fill all the required fields.');
        }
    }

    public function destroy(string $id)
    {
        if (auth()->user()->can('delete-role')) {
            Role::find($id)->delete();
            return redirect()->back()->with('success', 'Role deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete role.');
        }
    }

    public function givePermission(Request $request, Role $role)
    {
        $permissions = $request->input('permissions', []);

        foreach ($role->permissions as $existingPermission) {
            if (!in_array($existingPermission->name, $permissions)) {
                $role->revokePermissionTo($existingPermission->name);
                back()->with('success', 'Permission updated successfully.');
            }
        }

        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
                back()->with('success', 'Permission updated successfully.');
            }
        }

        return redirect()->back();
    }
}
