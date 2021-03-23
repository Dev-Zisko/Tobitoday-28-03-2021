<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\PaymentController;

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

	Route::get('/beneficiarios/{id}', [ViewController::class, 'view_beneficiaries'])->name('beneficiarios');

	Route::get('/crear-beneficiario/{id}', [ViewController::class, 'view_create_beneficiary'])->name('crear-beneficiario');

	Route::post('/crear-beneficiario/{id}', [BeneficiaryController::class, 'create_beneficiary'])->name('crear-beneficiario');

	Route::get('/editar-beneficiario/{id}', [ViewController::class, 'view_update_beneficiary'])->name('editar-beneficiario');

	Route::post('/editar-beneficiario/{id}', [BeneficiaryController::class, 'update_beneficiary'])->name('editar-beneficiario');

	Route::get('/eliminar-beneficiario/{id}', [ViewController::class, 'view_delete_beneficiary'])->name('eliminar-beneficiario');

	Route::post('/eliminar-beneficiario/{id}', [BeneficiaryController::class, 'delete_beneficiary'])->name('eliminar-beneficiario');
	
	Route::get('/beneficiarios-u', [ViewController::class, 'view_userbeneficiaries'])->name('beneficiarios-u');

	Route::get('/crear-beneficiario-u', [ViewController::class, 'view_create_userbeneficiary'])->name('crear-beneficiario-u');

	Route::post('/crear-beneficiario-u', [BeneficiaryController::class, 'create_beneficiary_u'])->name('crear-beneficiario-u');

	Route::get('/editar-beneficiario-u/{id}', [ViewController::class, 'view_update_userbeneficiary'])->name('editar-beneficiario-u');

	Route::post('/editar-beneficiario-u/{id}', [BeneficiaryController::class, 'update_beneficiary_u'])->name('editar-beneficiario-u');

	Route::get('/eliminar-beneficiario-u/{id}', [ViewController::class, 'view_delete_userbeneficiary'])->name('eliminar-beneficiario-u');

	Route::post('/eliminar-beneficiario-u/{id}', [BeneficiaryController::class, 'delete_beneficiary_u'])->name('eliminar-beneficiario-u');

	Route::get('/remesas', [ViewController::class, 'view_payments'])->name('remesas');

	Route::get('/remesas-usuarios/{id}', [ViewController::class, 'view_payments2'])->name('remesas-usuarios');

	Route::get('/crear-remesa/{id}', [ViewController::class, 'view_create_payment'])->name('crear-remesa');

	Route::post('/crear-remesa/{id}', [PaymentController::class, 'create_payment'])->name('crear-remesa');

	Route::get('/editar-remesa/{id}', [ViewController::class, 'view_update_payment'])->name('editar-remesa');

	Route::post('/editar-remesa/{id}', [PaymentController::class, 'update_payment'])->name('editar-remesa');

	Route::get('/eliminar-remesa/{id}', [ViewController::class, 'view_delete_payment'])->name('eliminar-remesa');

	Route::post('/eliminar-remesa/{id}', [PaymentController::class, 'delete_payment'])->name('eliminar-remesa');

	Route::get('/ver-remesa/{id}', [ViewController::class, 'view_detail_payment'])->name('ver-remesa');

	Route::post('/ver-remesa/{id}', [PaymentController::class, 'detail_payment'])->name('ver-remesa');

	Route::get('/tasa-del-dia', [ViewController::class, 'view_rate'])->name('tasa-del-dia');

	Route::post('/tasa-del-dia', [RateController::class, 'update_rate'])->name('tasa-del-dia');

});