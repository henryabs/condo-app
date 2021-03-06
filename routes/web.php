<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
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
//PAGES CONTROLLER
Route::get('/', [PagesController::class, 'main'])->name('admin.main');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    //PAGES CONTROLLER
   Route::get('/', [PagesController::class, 'index'])->name('admin.index');

   //BUILDING CONTROLLER
   Route::get('/buildings/create', [BuildingController::class, 'create'])->name('building.create');
   Route::get('/buildings/lists', [BuildingController::class, 'buildingLists'])->name('building.lists');

    //USER CONTROLLER
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/lists', [UserController::class, 'userLists'])->name('user.lists');
    Route::get('/users/roles', [UserController::class, 'roles'])->name('user.roles');
    Route::get('/users/permissions', [UserController::class, 'permissions'])->name('user.permissions');
    //ROLES
    Route::get('/users/roles/create', [UserController::class, 'createRole'])->name('user.roles.create');
    Route::post('/users/roles/store', [UserController::class, 'storeRole'])->name('user.roles.store');

    //REPORT CONTROLLER
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
});


Route::get('/test', function (){
    $user = \App\Models\User::find(2);
    $user->givePermissionTo('create buildings');// ALLOWED GET VIA PERMISSION NAME

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
