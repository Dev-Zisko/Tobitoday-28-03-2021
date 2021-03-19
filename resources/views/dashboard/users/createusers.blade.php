@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{Session::get('error')}}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="text-align: center; color: #007ED8 !important;" class="m-0 font-weight-bold text-primary">Crear Usuario</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <form style="margin: 0 auto;" class="form-login" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header card-header-primary text-center">
                <div class="social-line">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre(s)..." value="{{ old('name') }}" required>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido(s)..." value="{{ old('lastname') }}" required>

                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-phone"></i>
                                </span>
                            </div>

                            <input id="phonenumber" name="phonenumber" type="text" class="form-control" placeholder="Número de teléfono (Opcional)..." value="{{ old('phonenumber') }}">

                        </div>
                        @if ($errors->has('phonenumber'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('phonenumber') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-envelope"></i>
                                </span>
                            </div>

                            <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ old('email') }}" required>

                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Apartamento(s)
                        </div>

                        <div class="card-body">
                            <table class="table" id="apartments_table">
                                <thead>
                                <tr>
                                    <th>N° de Apartamento</th>
                                    <th>Alicuota</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input id="apartment" name="apartment[]" class="form-control" type="text" required />
                                        </td>
                                        <td>
                                            <input id="aliquot" name="aliquot[]" class="form-control" type="number" step="any" required />
                                        </td>
                                        <td>
                                            <a type="button" style="color: red;" name="delete" id="delete" onclick="deleteApartment('+i+')">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button style="background: #007ED8;" name="add" id="add" type="button" class="btn btn-sm btn-secondary" onclick="addApartment()">+ Añadir otro apartamento</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Rol</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-list"></i>
                                </span>
                            </div>
                            <select type="text" id="role" name="role" class="form-control" required>
                                <option value="Propietario" selected>Propietario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-key"></i>
                                </span>
                            </div>

                            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{ old('password') }}" required>

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #007ED8;" class="fa fa-fw fa-key"></i>
                                </span>
                            </div>

                            <input id="repassword" name="repassword" type="password" class="form-control" placeholder="Repetir contraseña..." value="{{ old('repassword') }}" required>

                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        @if ($errors->has('repassword'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('repassword') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="footer text-center">
                <button style="color: #007ED8;" type="submit" class="btn btn-outline-dark"><i style="color: #007ED8;" class="fa fa-fw fa-save"></i> Crear</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection