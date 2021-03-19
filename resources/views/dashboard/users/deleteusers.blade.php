@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #007ED8 !important;" class="m-0 font-weight-bold text-primary">Datos del Propietario a eliminar</h6>
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
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre(s)..." value="{{ $user->name }}" disabled>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #007ED8;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>
                            <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido(s)..." value="{{ $user->lastname }}" disabled>
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #007ED8;" class="fa fa-fw fa-phone"></i>
                                </span>
                            </div>
                            <input id="phonenumber" name="phonenumber" type="text" class="form-control" placeholder="Número de teléfono (Opcional)..." value="{{ $user->phonenumber }}" disabled>
                            @if ($errors->has('phonenumber'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('phonenumber') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #007ED8;" class="fa fa-fw fa-envelope"></i>
                                </span>
                            </div>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ $user->email }}" disabled>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
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
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </br>

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                      <label class="col-md-12 control-label" style="text-align: center;">Rol</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i style="color: #007ED8;" class="fa fa-fw fa-list"></i>
                              </span>
                          </div>
                          <input id="role" name="role" type="text" class="form-control" placeholder="Rol..." value="{{ $user->role }}" disabled>
                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="footer text-center">
                    <button style="color: #007ED8;" type="submit" class="btn btn-outline-dark"><i style="color: #007ED8;" class="fa fa-fw fa-trash"></i> Eliminar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection