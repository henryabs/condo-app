<?php

namespace App\Http\Controllers;
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
            return view('admin.user.lists');
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
}
