<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * ROLES CRUD
     */
    public function roles()
    {
        $data['pageTitle'] = "Roles & Permissions";
        $data['i'] = "0";
        $roles = Role::with('permissions')->get();

        return view('backend.roles.index', compact('roles'), $data);
    }

    public function createRole()
    {
        $data['pageTitle'] = "Add Role";
        $permissions = Permission::latest()->get();

        return view('backend.roles.create', compact('permissions'), $data);
    }

    public function storeRole(Request $request)
    {
    	$request->validate([
            'name'	=> 'required|string|max:255|unique:roles'
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->givePermissionTo($request->selectedpermissions);

        return redirect()->route('roles-permissions');
        
    }

    public function editRole($id)
    {
        $data['pageTitle'] = "Edit Role";
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::latest()->get();

        return view('backend.roles.edit', compact('role','permissions'), $data);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:roles,name,'.$id
        ]);

    	$role = Role::findById($id); 
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->selectedpermissions);

        return redirect()->route('roles-permissions');
    }

    /**
     * PERMISSIONS CRUD
     */
    public function createPermission() 
    {
        $data['pageTitle'] = "Add Permission";
        $roles = Role::latest()->get();
        $permissions = Permission::latest()->get();

        return view('backend.permissions.create', compact('roles','permissions'), $data);
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:permissions'
        ]);

        $permission = Permission::create(['name' => $request->name]);
        $permission->assignRole($request->selectedroles);

        $roles = Role::latest()->get();
        $permissions = Permission::latest()->get();

        return view('backend.permissions.create', compact('roles','permissions'));
    }

    public function editPermission($id)
    {
        $data['pageTitle'] = "Edit Permission";
        $permission = Permission::with('roles')->find($id);
        $roles = Role::latest()->get();

        return view('backend.permissions.edit', compact('roles','permission') , $data);
    }

    public function updatePermission(Request $request, $id)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:permissions,name,'.$id
        ]);

    	$permission = Permission::findById($id); 
        $permission->update(['name' => $request->name]);
        $permission->syncRoles($request->selectedroles);

        return redirect()->route('roles-permissions');
    }
}
