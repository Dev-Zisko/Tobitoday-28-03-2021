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
    // Vista principal de la página, no requiere Auth

    public function view_index()
    {
        try {
            return view('index');
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('index');
        }
    }

    // Vista principal del panel administrativo, requiere Auth

    public function view_dashboard()
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$users = User::All();
                return view('dashboard.users.users', compact('users'));
            }
            else if (Auth::user()->role == "Usuario") {
                $beneficiaries = Beneficiary::where('id_user', Auth::user()->id)->orderby('identification')->get(); 
                return view('users.beneficiaries.beneficiaries', compact('beneficiaries'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // Vistas para los administradores

    // CRUD Usuarios

    public function view_users()
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$users = User::All();
                return view('dashboard.users.users', compact('users'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_create_user()
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$countries = Country::All();
                return view('dashboard.users.createusers', compact('countries'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_update_user($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$newid = Crypt::decrypt($id);
            	$user = User::find($newid);
            	$countries = Country::All();
                return view('dashboard.users.updateusers', compact('user','countries'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_delete_user($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$newid = Crypt::decrypt($id);
            	$user = User::find($newid);
            	$countries = Country::All();
                return view('dashboard.users.deleteusers', compact('user','countries'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // CRUD Beneficiarios

    public function view_beneficiaries($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $benefactor = User::where('id', $newid)->first();
            	$beneficiaries = Beneficiary::where('id_user', $newid)->get();
            	$beneficiaries->map(function($beneficiary){
            		$user = User::find($beneficiary->id_user);
	                $beneficiary->benefactor = $user->identification . " - " . $user->name . " " . $user->lastname;
            	});
                return view('dashboard.beneficiaries.beneficiaries', compact('beneficiaries', 'benefactor'));
            }
            else {
                return view('index');
            }
        } catch(Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_create_beneficiary($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $benefactor = User::where('id', $newid)->get();
                return view('dashboard.beneficiaries.createbeneficiaries', compact('benefactor'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_update_beneficiary($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
            	$beneficiary = Beneficiary::find($newid);
                $benefactor = User::find($beneficiary->id_user);
                return view('dashboard.beneficiaries.updatebeneficiaries', compact('beneficiary', 'benefactor'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_delete_beneficiary($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$newid = Crypt::decrypt($id);
            	$beneficiary = Beneficiary::find($newid);
            	$benefactor = User::find($beneficiary->id_user);
                return view('dashboard.beneficiaries.deletebeneficiaries', compact('beneficiary','benefactor'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // CRUD Remesas

    public function view_payments()
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $payments = Payment::All()->sortby('status');
                $payments->map(function($payment){
                    $user = User::find($payment->id_user);
                    $beneficiary = Beneficiary::find($payment->id_beneficiary);
                    $payment->benefactor = $user->identification . " - " . $user->name . " " . $user->lastname;
                    $payment->beneficiary = $beneficiary->identification . " - " . $beneficiary->name . " " . $beneficiary->lastname;
                    $payment->amountbs = $payment->amount * $payment->rate;
                });
                return view('dashboard.payments.payments', compact('payments'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_payments2($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $benefactor = User::where('id', $newid)->first();
                $payments = Payment::where('id_user', $newid)->orderby('status')->get();
                $payments->map(function($payment){
                    $user = User::find($payment->id_user);
                    $beneficiary = Beneficiary::find($payment->id_beneficiary);
                    $payment->benefactor = $user->identification . " - " . $user->name . " " . $user->lastname;
                    $payment->beneficiary = $beneficiary->identification . " - " . $beneficiary->name . " " . $beneficiary->lastname;
                    $payment->amountbs = $payment->amount * $payment->rate;
                });
                return view('dashboard.payments.payments2', compact('payments', 'benefactor'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_create_payment($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $benefactor = User::find($newid);
                $beneficiaries = Beneficiary::where('id_user', $newid)->get();
                $rate = Rate::find(1);
                return view('dashboard.payments.createpayments', compact('benefactor', 'beneficiaries', 'rate'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_update_payment($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $payment = Payment::find($newid);
                $benefactor = User::find($payment->id_user);
                $beneficiaries = Beneficiary::where('id_user', $benefactor->id)->get();
                // PENDIENTE PREGUNTAR QUE TASA SE USARA
                $rate = Rate::find(1);
                $amountbs = $payment->amount * $payment->rate;
                return view('dashboard.payments.updatepayments', compact('payment', 'amountbs', 'beneficiaries', 'rate'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_delete_payment($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $payment = Payment::find($newid);
                $benefactor = User::find($payment->id_user);
                $beneficiary = Beneficiary::find($payment->id_beneficiary);
                $amountbs = $payment->amount * $payment->rate;
                return view('dashboard.payments.deletepayments', compact('payment', 'amountbs','benefactor', 'beneficiary'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_detail_payment($id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $payment = Payment::find($newid);
                $benefactor = User::find($payment->id_user);
                $beneficiary = Beneficiary::find($payment->id_beneficiary);
                $amountbs = $payment->amount * $payment->rate;
                return view('dashboard.payments.detailpayments', compact('payment', 'amountbs','benefactor', 'beneficiary'));
            }
            else {
                return view('index');
            }
        } catch(Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // CRUD Tasa del día

    public function view_rate()
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$rate = Rate::find(1);
                return view('dashboard.rates.rate', compact('rate'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // Vista para los Usuarios

    // CRUD Usuarios

    public function view_profile()
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $user = User::find(Auth::user()->id);
                $countries = Country::All();
                return view('users.updateprofile', compact('countries','user'));
            }
            else {
                return view('index');
            }
        } catch(Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // CRUD Beneficiarios

    public function view_my_beneficiaries()
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $beneficiaries = Beneficiary::where('id_user', Auth::user()->id)->orderby('identification')->get(); 
                return view('users.beneficiaries.beneficiaries', compact('beneficiaries'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_create_my_beneficiary()
    {
        try {
            if (Auth::user()->role == "Usuario") {
                return view('users.beneficiaries.createbeneficiaries');
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_update_my_beneficiary($id)
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $newid = Crypt::decrypt($id);
                $beneficiary = Beneficiary::find($newid);
                return view('users.beneficiaries.updatebeneficiaries', compact('beneficiary'));
            }
            else {
                return view('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_delete_my_beneficiary($id)
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $newid = Crypt::decrypt($id);
                $beneficiary = Beneficiary::find($newid);
                $benefactor = User::find($beneficiary->id_user);
                return view('users.beneficiaries.deletebeneficiaries', compact('beneficiary','benefactor'));
            }
            else {
                return view('index');
            }
        } catch(Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    // CRUD Remesas

    public function view_list_payments()
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $payments = Payment::where('id_user', Auth::user()->id)->orderby('created_at', 'DESC')->get();
                $payments->map(function($payment){
                    $beneficiary = Beneficiary::find($payment->id_beneficiary);
                    $payment->beneficiary = $beneficiary->identification . " - " . $beneficiary->name . " " . $beneficiary->lastname;
                    $payment->amountbs = $payment->amount * $payment->rate;
                    $payment->date = date_format($payment->created_at, "d/m/Y");
                });
                return view('users.payments.payments', compact('payments'));
            }
            else {
                return view('index');
            }
        } catch(Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }

    public function view_send_payment($id)
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $newid = Crypt::decrypt($id);
                $beneficiary = Beneficiary::find($newid);
                $rate = Rate::find(1);
                return view('users.payments.sendpayment', compact('beneficiary', 'rate'));
            }
            else {
                return view('index');
            }
        } catch(Exception $ex) {
            Session::flash('error', 'Error al entrar al sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return view('welcome');
        }
    }
}
