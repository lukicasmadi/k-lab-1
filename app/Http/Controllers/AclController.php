<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\CreateRoleRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreatePermissionRequest;

class AclController extends Controller
{

    public function role_index()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('acl.role_index', compact('roles'));
    }

    public function role_create()
    {
        return view('acl.role_create');
    }

    public function role_store(CreateRoleRequest $request)
    {
        Role::create(['name' => request('role_name')]);
        flash('New role created')->success();
        return redirect()->route('role_index');
    }

    public function role_edit($id)
    {
        $role = Role::findOrFail($id);
        return view('acl.role_edit', compact('role'));
    }

    public function role_update(CreateRoleRequest $request, $id)
    {
        Role::find($id)->update([
            'name' => request('role_name')
        ]);
        flash('Role name updated')->success();
        return redirect()->route('role_index');
    }

    public function role_delete($id)
    {
        if($id == 1) {
            return response()->json([
                'output' => "You're not allowed",
            ], 403);
        }

        $data = Role::whereId($id)->firstOrFail();
        $data->delete();

        return response()->json([
            'output' => 'Your data has been deleted.',
        ], 200);
    }

    public function permission_index()
    {
        $permissions = Permission::orderBy('id', 'asc')->get();
        return view('acl.permission_index', compact('permissions'));
    }

    public function permission_create()
    {
        return view('acl.permission_create');
    }

    public function permission_store(CreatePermissionRequest $request)
    {
        Permission::create(['name' => request('permission_name')]);
        flash('New permission created')->success();
        return redirect()->route('permission_index');
    }

    public function permission_edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('acl.permission_edit', compact('permission'));
    }

    public function permission_update(CreatePermissionRequest $request, $id)
    {
        Permission::find($id)->update([
            'name' => request('permission_name')
        ]);
        flash('Permission name updated')->success();
        return redirect()->route('permission_index');
    }

    public function permission_delete($id)
    {
        $data = Permission::whereId($id)->firstOrFail();
        $data->delete();

        return response()->json([
            'output' => 'Your data has been deleted.',
        ], 200);
    }
}
