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
            <h6 style="text-align: center; color: #FF6723 !important;" class="m-0 font-weight-bold text-primary">Editar Usuario</h6>
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
                                    <i style="color: #FF6723;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre(s)..." value="{{ $user->name }}" required>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido(s)..." value="{{ $user->lastname }}" required>

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

                    <div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-id-card"></i>
                                </span>
                            </div>

                            <input id="identification" name="identification" type="text" class="form-control" placeholder="Documento de identidad (CI, DNI, Pasaporte, PPS)..." value="{{ $user->identification }}" required>

                        </div>
                        @if ($errors->has('identification'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('identification') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Country</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-flag icon-form-color"></i>
                                </span>
                            </div>
                            <select type="text" id="country" name="country" class="form-control" required>
                                @foreach($countries as $country)
                                    @if($country->acronym == $user->country)
                                        <option value="{{ $country->acronym }}" selected>{{ $country->name }}</option>
                                    @else
                                        <option value="{{ $country->acronym }}">{{ $country->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-envelope"></i>
                                </span>
                            </div>

                            <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ $user->email }}" required>

                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <p style="text-align: center; color: #FF6723; font-style: bold;">Si no quiere cambiar la contraseña, deje estos campos vacíos</h4>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-key"></i>
                                </span>
                            </div>

                            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{ old('password') }}">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-key"></i>
                                </span>
                            </div>

                            <input id="repassword" name="repassword" type="password" class="form-control" placeholder="Repetir contraseña..." value="{{ old('repassword') }}">

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
                <button style="color: #FF6723;" type="submit" class="btn btn-outline-dark"><i style="color: #FF6723;" class="fa fa-fw fa-edit"></i> Guardar cambios</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection