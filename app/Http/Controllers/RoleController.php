<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.role.index', ['roles' => Role::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.role.create',[
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('message', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.role.edit', ['role' => Role::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        return redirect()->route('admin.roles.index')->with('message', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();

        return redirect()->route('admin.roles.index')->with('message', 'Role deleted successfully');
    }

    public function givePermission(string $roleId)
    {
        return view('admin.pages.role.give-permission', [
            'role' => Role::find($roleId),
            'permissions' => Permission::get()
        ]);
    }

    public function storePermission(Request $request, string $roleId)
    {
        $role = Role::find($roleId);
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')->with('message', 'Permissions assigned successfully');
    }
}
