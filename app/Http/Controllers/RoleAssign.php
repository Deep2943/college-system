<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleAssign extends Controller
{

    public function index()
    {
        $data['pageTitle'] = "Assign Role";
        $data['i'] = "0";
        $users = User::with('roles')->latest()->paginate(10);

        return view('backend.assignrole.index', compact('users'), $data);
    }

    public function create()
    {
        $data['pageTitle'] = "Add User";
        $roles = Role::latest()->get();
        
        return view('backend.assignrole.create', compact('roles'), $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $user->assignRole($request->role);

        return redirect()->route('assignrole.index');
    }

    public function edit($id)
    {
        $data['pageTitle'] = "Edit User";
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::latest()->get();
        
        return view('backend.assignrole.edit', compact('user','roles'), $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        $user->syncRoles($request->selectedrole);

        return redirect()->route('assignrole.index');
    }

    // NOT DONE
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // $user->removeRole('writer');
        // $user->syncRoles(['writer', 'admin']);

        // if ($user->delete()) {

        //     if($user->profile_picture != 'avatar.png') {

        //         $image_path = public_path() . '/images/profile/' . $user->profile_picture;

        //         if (is_file($image_path) && file_exists($image_path)) {

        //             unlink($image_path);
        //         }
        //     }
            
        // }

        return back();
    }
}
