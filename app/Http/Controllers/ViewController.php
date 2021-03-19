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
use App\Models\Country;
use App\Models\Rate;
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
                return view('users.beneficiaries');
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
            	$countries = Country::All();
                return view('dashboard.users.createusers', compact('countries'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_update_user($id)
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$newid = Crypt::decrypt($id);
            	$user = User::find($newid);
            	$countries = Country::All();
                return view('dashboard.users.updateusers', compact('user','countries'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_delete_user($id)
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$newid = Crypt::decrypt($id);
            	$user = User::find($newid);
            	$countries = Country::All();
                return view('dashboard.users.deleteusers', compact('user','countries'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_beneficiaries()
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$beneficiaries = Beneficiary::All();
            	$beneficiaries->map(function($beneficiary){
            		$user = User::find($beneficiary->id_user);
	                $beneficiary->benefactor = $user->name . " " . $user->lastname 
	                . " (" . $user->identification . ")";
            	});
                return view('dashboard.beneficiaries.beneficiaries', compact('beneficiaries'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_create_beneficiary()
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$benefactors = User::All()->sortby('identification');
                return view('dashboard.beneficiaries.createbeneficiaries', compact('benefactors'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_update_beneficiary($id)
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$newid = Crypt::decrypt($id);
            	$user = User::find($newid);
            	$countries = Country::All();
                return view('dashboard.beneficiaries.updatebeneficiaries', compact('user','countries'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_delete_beneficiary($id)
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$newid = Crypt::decrypt($id);
            	$user = User::find($newid);
            	$countries = Country::All();
                return view('dashboard.beneficiaries.deletebeneficiaries', compact('user','countries'));
            }
            else{
                return view('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_rate()
    {
        try{
            if(Auth::user()->role == "Administrador"){
            	$rate = Rate::find(1);
                return view('dashboard.rates.rate', compact('rate'));
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