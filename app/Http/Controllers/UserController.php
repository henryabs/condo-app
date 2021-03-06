<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('admin.user.create');
    }

    public function userLists(){
        return view('admin.user.lists');
    }

    public function roles(){
        $roles = Role::all()->pluck('name');
        return view('admin.user.roles', ['roles' => $roles]);
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
