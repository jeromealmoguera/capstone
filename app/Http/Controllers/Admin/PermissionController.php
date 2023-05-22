<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('admin.pages.permissions.index', compact('permissions', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required']]);

       Permission::create($validated);

       return to_route('permissions.index');
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => ['required']]);
        $permission->update($validated);

        return to_route('permissions.index');
    }

    public function destroy(Permission $permission) {
        $permission->delete();

        return back()->with('message', 'Permission deleted.');
    }

    public function giveRole(Request $request, Permission $permission)
    {

        if (!$permission) {
            return back()->with('message', 'Permission not found.');
        }

        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role already exists.');
        }

        $permission->assignRole($request->role);

        return back()->with('message', 'Role added.');
    }

    public function removeRole(Permission $permission, Role $role)

    {
        if ($permission->hasRole($role)) {
            $permission->assignRole($role);
            return back()->with('message', 'Role revoked.');
        }

        return back()->with('message', 'Role not exist.');
    }
}
