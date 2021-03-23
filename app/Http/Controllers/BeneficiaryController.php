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

class BeneficiaryController extends Controller
{
    public function create_beneficiary(Request $request, $id){
        try{
            if(Auth::user()->role == "Administrador"){
                $newid = Crypt::decrypt($id);
                $beneficiary = new Beneficiary;
                $beneficiary->name = $request->name;
                $beneficiary->lastname = $request->lastname;
                $beneficiary->identification = $request->identification;
                $beneficiary->bank = $request->bank;
                $beneficiary->number_account = $request->number_account;
                $beneficiary->mobile_payment = $request->mobile_payment;
                $beneficiary->phonenumber = $request->phonenumber;
                $beneficiary->email = $request->email;
                $beneficiary->id_user = $newid;
                $beneficiary->save();
                Session::flash('message', 'Beneficiario creado exitosamente!');
                return redirect('beneficiarios/'.$id);
            }else{
                return redirect('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function update_beneficiary(Request $request, $id){
        try{
            if(Auth::user()->role == "Administrador"){
            	$newid = Crypt::decrypt($id);
            	Beneficiary::where('id', $newid)->update(['name' => $request->name]);
                Beneficiary::where('id', $newid)->update(['lastname' => $request->lastname]);
                Beneficiary::where('id', $newid)->update(['identification' => $request->identification]);
                Beneficiary::where('id', $newid)->update(['bank' => $request->bank]);
                Beneficiary::where('id', $newid)->update(['number_account' => $request->number_account]);
                Beneficiary::where('id', $newid)->update(['mobile_payment' => $request->mobile_payment]);
                Beneficiary::where('id', $newid)->update(['phonenumber' => $request->phonenumber]);
                Beneficiary::where('id', $newid)->update(['email' => $request->email]);
                $beneficiary = Beneficiary::find($newid);
                Session::flash('message', 'Beneficiario editado exitosamente!');
                return redirect('beneficiarios/'.Crypt::encrypt($beneficiary->id_user));
            }else{
                return redirect('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function delete_beneficiary(Request $request, $id){
        try{
            if(Auth::user()->role == "Administrador"){
                $newid = Crypt::decrypt($id);
                Payment::where('id_beneficiary', $newid)->delete();
                $beneficiary = Beneficiary::find($newid);
                Beneficiary::where('id', $newid)->delete();
                Session::flash('message', 'Beneficiario eliminado exitosamente!');
                return redirect('beneficiarios/'.Crypt::encrypt($beneficiary->id_user));
            }else{
                return redirect('welcome');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }
}
