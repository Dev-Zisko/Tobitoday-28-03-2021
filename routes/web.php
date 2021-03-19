<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\RateController;

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

Route::get('404', function(){
    abort(404);
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

	Route::get('/beneficiarios', [ViewController::class, 'view_beneficiaries'])->name('beneficiarios');

	Route::get('/crear-beneficiario', [ViewController::class, 'view_create_beneficiary'])->name('crear-beneficiario');

	Route::post('/crear-beneficiario', [BeneficiaryController::class, 'create_beneficiary'])->name('crear-beneficiario');

	Route::get('/editar-beneficiario/{id}', [ViewController::class, 'view_update_beneficiary'])->name('editar-beneficiario');

	Route::post('/editar-beneficiario/{id}', [BeneficiaryController::class, 'update_beneficiary'])->name('editar-beneficiario');

	Route::get('/eliminar-beneficiario/{id}', [ViewController::class, 'view_delete_beneficiary'])->name('eliminar-beneficiario');

	Route::post('/eliminar-beneficiario/{id}', [BeneficiaryController::class, 'delete_beneficiary'])->name('eliminar-beneficiario');

	Route::get('/tasa-del-dia', [ViewController::class, 'view_rate'])->name('tasa-del-dia');

	Route::post('/tasa-del-dia', [RateController::class, 'update_rate'])->name('tasa-del-dia');

});