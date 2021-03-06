<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function create(){
        return view('admin.building.create');
    }

    public function buildingLists(){
        return view('admin.building.lists');
    }
}
