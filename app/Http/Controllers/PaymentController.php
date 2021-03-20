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
    public function create_payment(Request $request){
        try{
            if(Auth::user()->role == "Administrador"){
                $payment = new Payment;
                $payment->amount = $request->amount;
                $rate = Rate::find(1);
                $payment->rate = $rate->rate;
                $payment->method = $request->method;
                if ($request->hasFile('voucher')){
                    $voucher = $request->file('voucher')->store('public');
                    $cutvoucher = substr($voucher, 7);
                    $payment->voucher = $cutvoucher;
                }
                $payment->status = "Por Verificar";
                $payment->id_user = $request->benefactor;
                $payment->id_beneficiary = $request->beneficiary;
                $payment->save();
                Session::flash('message', 'Remesa creada exitosamente!');
                return redirect('remesas');
            }else{
                return redirect('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function update_payment(Request $request, $id){
        try{
            if(Auth::user()->role == "Administrador"){
            	$newid = Crypt::decrypt($id);
                if(User::where([['email', $request->email], ['id', '!=', $newid]])->exists() || User::where([['identification', $request->identification], ['id', '!=', $newid]])->exists()){
                    Session::flash('error', 'El correo o número de identificación ya esta registrado en el sistema, por favor revise e intentenuevamente.');
                    return redirect('usuarios');
                }else{
                	User::where('id', $newid)->update(['name' => $request->name]);
                    User::where('id', $newid)->update(['lastname' => $request->lastname]);
                    User::where('id', $newid)->update(['identification' => $request->identification]);
                    User::where('id', $newid)->update(['country' => $request->country]);
                    User::where('id', $newid)->update(['email' => $request->email]);
                    User::where('id', $newid)->update(['role' => $request->role]);
                    if($request->password != "" && $request->repassword != "" && ($request->password == $request->repassword)){
                        User::where('id', $newid)->update(['password' => Hash::make($request->password)]);
                    }
                    Session::flash('message', 'Usuario editado exitosamente!');
                    return redirect('usuarios');
                }
            }else{
                return redirect('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function delete_payment(Request $request, $id){
        try{
            if(Auth::user()->role == "Administrador"){
                $newid = Crypt::decrypt($id);
                Payment::where('id_user', $newid)->delete();
                Beneficiary::where('id_user', $newid)->delete();
                User::where('id', $newid)->delete();
                Session::flash('message', 'Usuario eliminado exitosamente!');
                return redirect('usuarios');
            }else{
                return redirect('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }
}
