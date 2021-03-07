<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        if(auth()->user()->can('manage users')){
            return view('admin.user.create');
        }else{
            abort(403);
        }
    }

    public function userLists(){
        if(auth()->user()->can('manage users')){
            $users = User::all();
            $roles = Role::all();
            $permissions = Permission::all();
            return view('admin.user.lists', ['users' => $users, 'permissions' => $permissions, 'roles' => $roles]);
        }else{
            abort(403);
        }
    }

    public function roles(){
        if(auth()->user()->can('manage users')){
            $roles = Role::all();
            $permissions = Permission::all();
            return view('admin.user.roles', ['roles' => $roles, 'permissions' => $permissions]);
        }else{
            abort(403);
        }
    }

    public function permissions(){
        if(auth()->user()->can('manage users')){
            $permissions = Permission::all();
            return view('admin.user.permissions', ['permissions' => $permissions]);
        }else{
            abort(403);
        }
    }

    public function createRole(){
        return view('admin.user.roles.create');
    }

    public function storeRole(Request $request){
        $validated = $request->validate([
           'name' => 'required|unique:roles|min:3|max:15'
        ]);
        $create_role = Role::create(['name' => $request->name]);
        if($create_role){
            $notification = ['message' => 'Role added successfully', 'alert-type' => 'success'];
            return redirect()->route('user.roles')->with($notification);
        }
    }

    public function storeUser(Request $request){
        if(auth()->user()->can('manage users')){
            $validated = $request->validate([
                'name' => 'required|max:30',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8'
            ]);
            $user_created = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if($user_created){
                $user_created->assignRole('standard');
                $notification = ['message' => 'User added successfully', 'alert-type' => 'success'];
                return redirect()->route('user.lists')->with($notification);
            }
        }else{
            abort(403);
        }

    }

    public function editUser($id){
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit', ['roles' => $roles, 'user' => $user, 'permissions' => $permissions]);
    }

    public function updateUser(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email',
        ]);

        $user = User::find($request->userID);
        //UPDATE BASIC DATA
        $user_updated = $user->update(['name' => $request->name, 'email' => $request->email]);
        if($user_updated){
            //UPDATE ROLE
            $user->syncRoles([$request->role]);
            //UPDATE SPECIAL PERMISSIONS
            $user->syncPermissions($request->permission);
            $notification = ['message' => 'User updated successfully', 'alert-type' => 'success'];
            return redirect()->route('user.lists')->with($notification);
        }





    }
}
