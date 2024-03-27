<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-user', 'set-userRole', 'show-user', 'delete-user'])) {
            $users = User::all();
            return view('admin.main.users.index', compact('users'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to User.');
        }
    }

    public function create()
    {
        $roles = Role::all();
        if (auth()->user()->can('create-user')) {
            return view('admin.main.users.create', compact('roles'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to add category.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['required', 'exists:roles,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->roles);

        if ($role) {
            $user->roles()->attach($role);
        }

        event(new Registered($user));

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('super_admin')) {
            return redirect()->back()->with('error', 'Cannot view profile of Super Admin.');
        }

        if (auth()->user()->can('show-user')) {
            $user = User::findOrFail($id);
            return view('admin.main.users.show', compact('user'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to show user.');
        }
    }

    public function role(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('super_admin')) {
            return redirect()->back()->with('error', 'Cannot set role for Super Admin.');
        }

        if (auth()->user()->can('set-userRole')) {
            $roles = Role::all();
            $permissions = Permission::all();

            return view('admin.main.users.role', compact('user', 'roles', 'permissions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to set role.');
        }
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('super_admin')) {
            return redirect()->back()->with('error', 'Cannot delete user Super Admin.');
        }

        if (auth()->user()->can('delete-user')) {
            User::find($id)->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete user.');
        }
    }

    public function giveRole(Request $request, User $user)
    {
        $roles = $request->input('roles', []);

        foreach ($user->roles as $existingRole) {
            if (!in_array($existingRole->name, $roles)) {
                $user->removeRole($existingRole->name);
            }
        }

        foreach ($roles as $role) {
            if (!$user->hasRole($role)) {
                $user->assignRole($role);
            }
        }
        return redirect()->back()->with('success', 'Role updated successfully.');
    }
}
