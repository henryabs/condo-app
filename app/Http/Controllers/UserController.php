<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create(){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
        return view('admin.user.create');
    }

    public function userLists(){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.lists', ['users' => $users, 'permissions' => $permissions, 'roles' => $roles]);
    }

    public function roles(){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.roles', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function permissions(){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
        $permissions = Permission::all();
        return view('admin.user.permissions', ['permissions' => $permissions]);
    }

    public function createRole(){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
        $permissions = Permission::all();
        return view('admin.user.roles.create', ['permissions' => $permissions]);
    }

    public function storeRole(Request $request){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
        $validated = $request->validate([
           'name' => 'required|unique:roles|min:3|max:15'
        ]);
        $create_role = Role::create(['name' => $request->name]);
        if($create_role){
            //SET PERMISSION DIRECTLY TO ROLE
            $create_role->syncPermissions($request->permission);
            $notification = ['message' => 'Role added successfully', 'alert-type' => 'success'];
            return redirect()->route('user.roles')->with($notification);
        }
    }

    public function storeUser(Request $request){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }
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

    }

    public function editUser($id){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }

        $user = User::find($id);

        $current_role = Role::findByName($user->getRoleNames()[0]);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit', ['roles' => $roles, 'user' => $user, 'permissions' => $permissions, 'current_role' => $current_role]);
    }

    public function updateUser(Request $request){
        if(!auth()->user()->hasPermissionTo('manage users')){
            abort(403);
        }

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
