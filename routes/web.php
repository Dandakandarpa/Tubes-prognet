<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MasterDiklatController;
use App\Http\Controllers\RiwayatDiklat;
use App\Http\Controllers\LoginController;
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
Route::get('/',function(){
    return redirect('/crud2');
});
// Route::get('/crud',[CrudController::class,'index'])->name('crud.list');
// Route::get('/crud/create',[CrudController::class,'create'])->name('crud.create');
// Route::get('/crud/{id}/edit',[CrudController::class,'edit'])->name('crud.edit');
// Route::delete('/crud/{id}',[CrudController::class,'deleteData'])->name('crud.delete');

// Route::post('/crud/listData',[CrudController::class,'listData'])->name('crud.listData');
// Route::post('/crud',[CrudController::class,'store'])->name('crud.store');
// Route::put('/crud/{id}',[CrudController::class,'update'])->name('crud.update');

Route::get('/crud2',[MasterController::class,'index'])->name('crud2.list');
Route::get('/crud2/create',[MasterController::class,'create'])->name('crud2.create');
Route::get('/crud2/{id}/view',[MasterController::class,'view'])->name('crud2.view');
Route::get('/crud2/{id}/edit',[MasterController::class,'edit'])->name('crud2.edit');
Route::delete('/crud2/{id}',[MasterController::class,'deleteData'])->name('crud2.delete');

Route::post('/crud2/listData',[MasterController::class,'listData'])->name('crud2.listData');
Route::post('/crud2',[MasterController::class,'store'])->name('crud2.store');
Route::put('/crud2/{id}',[MasterController::class,'update'])->name('crud2.update');

Route::get('/crud3',[MasterDiklatController::class,'index'])->name('crud3.list');
Route::get('/crud3/create',[MasterDiklatController::class,'create'])->name('crud3.create');
Route::get('/crud3/{id_diklat}/edit',[MasterDiklatController::class,'edit'])->name('crud3.edit');
Route::delete('/crud3/{id}',[MasterDiklatController::class,'deleteData'])->name('crud3.delete');

Route::post('/crud3/listData',[MasterDiklatController::class,'listData'])->name('crud3.listData');
Route::post('/crud3',[MasterDiklatController::class,'store'])->name('crud3.store');
Route::put('/crud3/{id}',[MasterDiklatController::class,'update'])->name('crud3.update');

Route::get('/crud4/{id}/{name}',[RiwayatDiklat::class,'index'])->name('crud4.list');
Route::get('/crud4/{id}/{name}/create',[RiwayatDiklat::class,'create'])->name('crud4.create');
Route::get('/crud4/{id_t_diklat}/{name}/edit',[RiwayatDiklat::class,'edit'])->name('crud4.edit');
Route::delete('/crud4/{id_t_diklat}',[RiwayatDiklat::class,'deleteData'])->name('crud4.delete');

Route::post('/crud4/listData',[RiwayatDiklat::class,'listData'])->name('crud4.listData');
Route::post('/crud4/{name}',[RiwayatDiklat::class,'store'])->name('crud4.store');
Route::put('/crud4/{id}/{name}',[RiwayatDiklat::class,'update'])->name('crud4.update');

Route::get('/login',[LoginController::class,'index'])->name('login.login');
Route::post('/login',[LoginController::class,'authenticate'])->name('login.authenticate');
Route::post('/logout',[LoginController::class,'logout']);