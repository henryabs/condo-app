<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    //PAGES CONTROLLER
   Route::get('/', [PagesController::class, 'index'])->name('admin.index');

   //BUILDING CONTROLLER
   Route::get('/buildings/create', [BuildingController::class, 'create'])->name('building.create');
   Route::get('/buildings/lists', [BuildingController::class, 'buildingLists'])->name('building.lists');

    //USER CONTROLLER
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/lists', [UserController::class, 'userLists'])->name('user.lists');

});




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
