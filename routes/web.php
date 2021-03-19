<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){

	Route::get('/panel-administrativo', [ViewController::class, 'view_dashboard'])->name('panel-administrativo');

	Route::get('/usuarios', [ViewController::class, 'view_users'])->name('usuarios');

	Route::get('/crear-usuario', [ViewController::class, 'view_create_user'])->name('crear-usuario');

	Route::post('/crear-usuario', [UserController::class, 'create_user'])->name('crear-usuario');

	Route::get('/editar-usuario/{id}', [ViewController::class, 'view_update_user'])->name('editar-usuario');

	Route::post('/editar-usuario/{id}', [UserController::class, 'update_user'])->name('editar-usuario');

	Route::get('/eliminar-usuario/{id}', [ViewController::class, 'view_delete_user'])->name('eliminar-usuario');

	Route::post('/eliminar-usuario/{id}', [UserController::class, 'delete_user'])->name('eliminar-usuario');

});