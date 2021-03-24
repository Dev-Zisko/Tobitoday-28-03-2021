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

// Routes principales de la página sin auth

Route::get('/', [ViewController::class, 'view_index'])->name('');

Route::get('/tobitoday', [ViewController::class, 'view_index'])->name('tobitoday');

// Route para errores de rutas que no existen en la página

Route::get('404', function(){
    abort(404);
});

Route::get('500', function(){
    abort(500);
});

// Routes básicas del CRUD de Auth Users

Auth::routes();

Route::group(['middleware'=>'auth'], function(){

	// Route principal para ambos usuarios al panel administrativo
	// Roles: Administrador || Usuario

	Route::get('/panel-administrativo', [ViewController::class, 'view_dashboard'])->name('panel-administrativo');

	// Routes para los Administradores

	// CRUD Usuarios

	Route::get('/usuarios', [ViewController::class, 'view_users'])->name('usuarios');

	Route::get('/crear-usuario', [ViewController::class, 'view_create_user'])->name('crear-usuario');

	Route::post('/crear-usuario', [UserController::class, 'create_user'])->name('crear-usuario');

	Route::get('/editar-usuario/{id}', [ViewController::class, 'view_update_user'])->name('editar-usuario');

	Route::post('/editar-usuario/{id}', [UserController::class, 'update_user'])->name('editar-usuario');

	Route::get('/eliminar-usuario/{id}', [ViewController::class, 'view_delete_user'])->name('eliminar-usuario');

	Route::post('/eliminar-usuario/{id}', [UserController::class, 'delete_user'])->name('eliminar-usuario');

	// CRUD Beneficiarios

	Route::get('/beneficiarios/{id}', [ViewController::class, 'view_beneficiaries'])->name('beneficiarios');

	Route::get('/crear-beneficiario/{id}', [ViewController::class, 'view_create_beneficiary'])->name('crear-beneficiario');

	Route::post('/crear-beneficiario/{id}', [BeneficiaryController::class, 'create_beneficiary'])->name('crear-beneficiario');

	Route::get('/editar-beneficiario/{id}', [ViewController::class, 'view_update_beneficiary'])->name('editar-beneficiario');

	Route::post('/editar-beneficiario/{id}', [BeneficiaryController::class, 'update_beneficiary'])->name('editar-beneficiario');

	Route::get('/eliminar-beneficiario/{id}', [ViewController::class, 'view_delete_beneficiary'])->name('eliminar-beneficiario');

	Route::post('/eliminar-beneficiario/{id}', [BeneficiaryController::class, 'delete_beneficiary'])->name('eliminar-beneficiario');

	// CRUD Remesas

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

	// CRUD Tasa del día

	Route::get('/tasa-del-dia', [ViewController::class, 'view_rate'])->name('tasa-del-dia');

	Route::post('/tasa-del-dia', [RateController::class, 'update_rate'])->name('tasa-del-dia');

	// Routes para los Usuarios

	// CRUD Usuarios

	Route::get('/editar-perfil', [ViewController::class, 'view_profile'])->name('editar-perfil');

	Route::post('/editar-perfil', [UserController::class, 'update_profile'])->name('editar-perfil');


	// CRUD Beneficiarios
	
	Route::get('/mis-beneficiarios', [ViewController::class, 'view_my_beneficiaries'])->name('mis-beneficiarios');

	Route::get('/crear-mi-beneficiario', [ViewController::class, 'view_create_my_beneficiary'])->name('crear-mi-beneficiario');

	Route::post('/crear-mi-beneficiario', [BeneficiaryController::class, 'create_my_beneficiary'])->name('crear-mi-beneficiario');

	Route::get('/editar-mi-beneficiario/{id}', [ViewController::class, 'view_update_my_beneficiary'])->name('editar-mi-beneficiario');

	Route::post('/editar-mi-beneficiario/{id}', [BeneficiaryController::class, 'update_my_beneficiary'])->name('editar-mi-beneficiario');

	Route::get('/eliminar-mi-beneficiario/{id}', [ViewController::class, 'view_delete_my_beneficiary'])->name('eliminar-mi-beneficiario');

	Route::post('/eliminar-mi-beneficiario/{id}', [BeneficiaryController::class, 'delete_my_beneficiary'])->name('eliminar-mi-beneficiario');

	// CRUD Remesas

	Route::get('/enviar-remesa/{id}', [ViewController::class, 'view_send_payment'])->name('enviar-remesa');

	Route::post('/enviar-remesa/{id}', [PaymentController::class, 'send_payment'])->name('enviar-remesa');

	Route::get('/lista-remesas', [ViewController::class, 'view_list_payments'])->name('lista-remesas');

});