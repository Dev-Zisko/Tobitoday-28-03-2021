<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Payment;
use Exception;
use Auth;

class ViewController extends Controller
{
    public function view_dashboard()
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$users = User::All();
                return view('dashboard.users.users', compact('users'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_users()
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$users = User::All();
                return view('dashboard.users.users', compact('users'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_create_user()
    {
        try{
            if(Auth::user()->role == "Administrador"){
                return view('dashboard.users.createusers');
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }
}