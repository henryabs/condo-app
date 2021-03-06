<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function main(){
        return view('admin.pages.main');
    }
    public function index(){
        return view('admin.pages.index');
    }
}
