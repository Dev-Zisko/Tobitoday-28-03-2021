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
            <h6 style="text-align: center; color: #FF6723 !important;" class="m-0 font-weight-bold text-primary">Eliminar Usuario</h6>
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

                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre(s)..." value="{{ $user->name }}" disabled>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido(s)..." value="{{ $user->lastname }}" disabled>

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

                            <input id="identification" name="identification" type="text" class="form-control" placeholder="Documento de identidad (CI, DNI, Pasaporte, PPS)..." value="{{ $user->identification }}" disabled>

                        </div>
                        @if ($errors->has('identification'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('identification') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-id-card"></i>
                                </span>
                            </div>

                            <input id="country" name="country" type="text" class="form-control" placeholder="País..." value="{{ $user->country }}" disabled>

                        </div>
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-envelope"></i>
                                </span>
                            </div>

                            <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ $user->email }}" disabled>

                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-id-card"></i>
                                </span>
                            </div>

                            <input id="role" name="role" type="text" class="form-control" placeholder="Rol..." value="{{ $user->role }}" disabled>

                        </div>
                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="footer text-center">
                <button style="color: #FF6723;" type="submit" class="btn btn-outline-dark"><i style="color: #FF6723;" class="fa fa-fw fa-trash"></i> Eliminar</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection