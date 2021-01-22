<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\CreateRoleRequest;

class AclController extends Controller
{

    public function role()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('acl.role_index', compact('roles'));
    }

    public function create()
    {
        return view('acl.role_create');
    }

    public function store(CreateRoleRequest $request)
    {
        Role::create(['name' => request('role_name')]);
        flash('New role created')->success();
        return redirect()->route('role');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('acl.role_edit', compact('role'));
    }

    public function update(CreateRoleRequest $request, $id)
    {
        Role::find($id)->update([
            'name' => request('role_name')
        ]);
        flash('Role name updated')->success();
        return redirect()->route('role');
    }

    public function destroy($id)
    {
        if($id == 1) {
            return response()->json([
                'output' => "You're not allowed",
            ], 403);
        }

        return response()->json([
            'output' => 'Your data has been deleted.',
        ], 200);

        $data = Role::whereId($id)->firstOrFail();
        $data->delete();
    }
}
