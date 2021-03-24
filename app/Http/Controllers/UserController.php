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

class UserController extends Controller
{
    // Funcionalidades CRUD Usuarios Administrador

    public function create_user(Request $request)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                if (User::where('email', $request->email)->exists() || User::where('identification', $request->identification)->exists()) {
                    Session::flash('error', 'El correo o número de identificación ya esta registrado en el sistema, por favor revise e intentenuevamente.');
                    return redirect('crear-usuario');
                } else {
                    $user = new User;
                    $user->name = $request->name;
                    $user->lastname = $request->lastname;
                    $user->identification = $request->identification;
                    $user->country = $request->country;
                    $user->email = $request->email;
                    $user->role = $request->role;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Session::flash('message', 'Usuario creado exitosamente!');
                    return redirect('usuarios');
                }
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function update_user(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
            	$newid = Crypt::decrypt($id);
                if (User::where([['email', $request->email], ['id', '!=', $newid]])->exists() || User::where([['identification', $request->identification], ['id', '!=', $newid]])->exists()) {
                    Session::flash('error', 'El correo o número de identificación ya esta registrado en el sistema, por favor revise e intentenuevamente.');
                    return redirect('usuarios');
                } else {
                	User::where('id', $newid)->update(['name' => $request->name]);
                    User::where('id', $newid)->update(['lastname' => $request->lastname]);
                    User::where('id', $newid)->update(['identification' => $request->identification]);
                    User::where('id', $newid)->update(['country' => $request->country]);
                    User::where('id', $newid)->update(['email' => $request->email]);
                    User::where('id', $newid)->update(['role' => $request->role]);
                    if ($request->password != "" && $request->repassword != "" && ($request->password == $request->repassword)) {
                        User::where('id', $newid)->update(['password' => Hash::make($request->password)]);
                    }
                    Session::flash('message', 'Usuario editado exitosamente!');
                    return redirect('usuarios');
                }
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function delete_user(Request $request, $id)
    {
        try {
            if (Auth::user()->role == "Administrador") {
                $newid = Crypt::decrypt($id);
                Payment::where('id_user', $newid)->delete();
                Beneficiary::where('id_user', $newid)->delete();
                User::where('id', $newid)->delete();
                Session::flash('message', 'Usuario eliminado exitosamente!');
                return redirect('usuarios');
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }

    public function update_user_profile(Request $request)
    {
        try {
            if (Auth::user()->role == "Usuario") {
            	$newid = Auth::user()->id;
                if (User::where([['email', $request->email], ['id', '!=', $newid]])->exists() || User::where([['identification', $request->identification], ['id', '!=', $newid]])->exists()) {
                    Session::flash('error', 'El correo o número de identificación ya esta registrado en el sistema, por favor revise e intentenuevamente.');
                    return redirect('mis-beneficiarios');
                } else {
                	User::where('id', $newid)->update(['name' => $request->name]);
                    User::where('id', $newid)->update(['lastname' => $request->lastname]);
                    User::where('id', $newid)->update(['identification' => $request->identification]);
                    User::where('id', $newid)->update(['country' => $request->country]);
                    User::where('id', $newid)->update(['email' => $request->email]);
                    if ($request->password != "" && $request->repassword != "" && ($request->password == $request->repassword)) {
                        User::where('id', $newid)->update(['password' => Hash::make($request->password)]);
                    }
                    Session::flash('message', 'Usuario editado exitosamente!');
                    return redirect('mis-beneficiarios');
                }
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }


}
