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
use App\Models\Rate;
use Exception;
use Auth;

class PaymentController extends Controller
{
    // Funcionalidades CRUD Remesas Administrador

    public function create_payment(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
        		$payment = new Payment;
                $payment->amount = $request->amount;
                $rate = Rate::find(1);
                $payment->rate = $rate->rate;
                $payment->method = $request->method;
                if ($request->hasFile('voucher')) {
                    $voucher = $request->file('voucher')->store('public');
                    $cutvoucher = substr($voucher, 7);
                    $payment->voucher = $cutvoucher;
                }
                $payment->status = $request->status;
                $payment->id_user = $newid;
                $payment->id_beneficiary = $request->beneficiary;
                $payment->save();
                Session::flash('message', 'Remesa creada exitosamente!');
                return redirect('remesas-usuarios/'.$id);
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function update_payment(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$newid = Crypt::decrypt($id);
            	Payment::where('id', $newid)->update(['amount' => $request->amount]);
            	$rate = Rate::find(1);
                Payment::where('id', $newid)->update(['rate' => $rate->rate]);
                Payment::where('id', $newid)->update(['method' => $request->method]);
                if ($request->hasFile('voucher')) {
                    $voucher = $request->file('voucher')->store('public');
                    $cutvoucher = substr($voucher, 7);
                    Payment::where('id', $newid)->update(['voucher' => $cutvoucher]);
                }
                Payment::where('id', $newid)->update(['status' => $request->status]);
                Payment::where('id', $newid)->update(['id_beneficiary' => $request->beneficiary]);
                $payment = Payment::find($newid);
                Session::flash('message', 'Remesa editada exitosamente!');
                return redirect('remesas-usuarios/'.Crypt::encrypt($payment->id_user));
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function delete_payment(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                $payment = Payment::find($newid);
                Payment::where('id', $newid)->delete();
                Session::flash('message', 'Remesa eliminada exitosamente!');
                return redirect('remesas-usuarios/'.Crypt::encrypt($payment->id_user));
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function detail_payment(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
	            $newid = Crypt::decrypt($id);
                Payment::where('id', $newid)->update(['status' => $request->status]);
                Session::flash('message', 'Estatus de la remesa editado exitosamente!');
                return redirect('remesas');
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    // Funcionalidades CRUD Remesas Usuarios

    public function send_payment(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Usuario") {
                $newid = Crypt::decrypt($id);
                $payment = new Payment;
                $payment->amount = $request->amount;
                $rate = Rate::find(1);
                $payment->rate = $rate->rate;
                $payment->method = $request->method;
                if ($request->hasFile('voucher')) {
                    $voucher = $request->file('voucher')->store('public');
                    $cutvoucher = substr($voucher, 7);
                    $payment->voucher = $cutvoucher;
                }
                $payment->status = "Por Verificar";
                $payment->id_user = Auth::user()->id;
                $payment->id_beneficiary = $newid;
                $payment->save();
                Session::flash('message', 'Remesa creada exitosamente!');
                return redirect('lista-remesas');
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }
}
