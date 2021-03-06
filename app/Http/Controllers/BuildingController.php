<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function create(){
        if(auth()->user()->can('create buildings')){
            return view('admin.building.create');
        }else{
            abort(403);
        }
    }

    public function buildingLists(){
        return view('admin.building.lists');
    }
}
