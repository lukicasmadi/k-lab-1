<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\RoleHasPermission;
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
        flash('Role baru didaftarkan')->success();
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

        flash('Nama role diupdate')->success();
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
            'output' => 'Role yang dipilih telah dihapus.',
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
        flash('Permission baru berhasil didaftarkan')->success();
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

        flash('Nama permission diupdate')->success();
        return redirect()->route('permission_index');
    }

    public function permission_delete($id)
    {
        $data = Permission::whereId($id)->firstOrFail();
        $data->delete();

        return response()->json([
            'output' => 'Permission yang dipilih telah dihapus.',
        ], 200);
    }

    public function user_data()
    {
        $model = User::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function role_data()
    {
        $model = Role::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function get_role_has_permission()
    {
        $emptyRoles = [];
        $userID = request('id');

        $userWithRole = User::with('roles')->whereId($userID)->first();
        $hasRoles = $userWithRole->roles;

        if(count($hasRoles) > 0) {
            foreach($hasRoles as $r) {
                array_push($emptyRoles, $r->name);
            }
        }

        $allRoles = Role::all();

        $allRoles->map(function ($item) use ($emptyRoles) {
            if(in_array($item->name, $emptyRoles)) {
                $item['checked_if'] = "checked";
            } else {
                $item['checked_if'] = "no_checked";
            }
        });

        return response()->json([
            'output' => 'Roles user dengan id '.$userID,
            'roles' => $allRoles
        ], 200);
    }

    public function user_to_role_index()
    {
        return view('acl.user_to_role');
    }

    public function permission_to_role_index()
    {
        return view('acl.permission_to_role');
    }

    public function get_permission_by_role($id)
    {
        $permission = Permission::select('id', 'name')->get();

        $roleHasPermission = RoleHasPermission::with(['permission' => function ($query) {
            $query->select('id', 'name', 'guard_name');
        }])->where('role_id', $id)->get();

        $rhs = [];

        foreach($roleHasPermission as $data) {
            array_push($rhs, $data->permission->name);
        }

        $permission->map(function ($item) use ($rhs) {
            if(in_array($item->name, $rhs)) {
                $item['checked_if'] = "checked";
            } else {
                $item['checked_if'] = "no_checked";
            }
        });

        return response()->json([
            'output' => 'Permission for role id '.$id,
            'roles' => $permission
        ], 200);
    }

    public function user_to_role_add(Request $request)
    {
        $data = $request->all();
        $newRoles = [];

        foreach($data as $key => $val) {
            if($key == "_token" || $key == "id_user") {
                continue;
            } else {
                $exp = explode("_", $key);
                array_push($newRoles, $exp[1]);
            }
        }

        $user = User::findOrFail($data['id_user']);

        $user->syncRoles($newRoles);

        flash('User telah didaftarkan ke roles')->success();
        return redirect()->back();
    }

    public function permission_to_role_add(Request $request)
    {
        $role = Role::where("id", $request->id_role)->firstOrFail();
        $allPermission = [];

        if(!empty($request->permissionid)) {
            foreach($request->permissionid as $key => $val) {
                array_push($allPermission, $val);
            }
        }

        $role->syncPermissions($allPermission);

        flash('Permissions telah ditambahkan ke role')->success();
        return redirect()->back();
    }
}
