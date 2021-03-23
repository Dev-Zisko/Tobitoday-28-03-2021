@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Beneficiarios</h1>
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
            <h6 style="text-align: center; color: #FF6723 !important;" class="m-0 font-weight-bold text-primary">Eliminar Beneficiario</h6>
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

                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre(s)..." value="{{ $beneficiary->name }}" disabled>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido(s)..." value="{{ $beneficiary->lastname }}" disabled>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-id-card"></i>
                                </span>
                            </div>

                            <input id="identification" name="identification" type="text" class="form-control" placeholder="Documento de identidad (CI, DNI, Pasaporte, PPS)..." value="{{ $beneficiary->identification }}" disabled>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-university"></i>
                                </span>
                            </div>

                            <input id="bank" name="bank" type="text" class="form-control" placeholder="Nombre del banco..." value="{{ $beneficiary->bank }}" disabled>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-file-invoice-dollar"></i>
                                </span>
                            </div>

                            <input id="number_account" name="number_account" type="text" class="form-control" placeholder="Número de cuenta bancaria..." value="{{ $beneficiary->number_account }}" disabled>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mobile_payment') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-mobile"></i>
                                </span>
                            </div>

                            <input id="mobile_payment" name="mobile_payment" type="number" class="form-control" placeholder="Pago móvil (Opcional)..." value="{{ $beneficiary->mobile_payment }}" disabled>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-phone"></i>
                                </span>
                            </div>

                            <input id="phonenumber" name="phonenumber" type="number" class="form-control" placeholder="Número de telefono..." value="{{ $beneficiary->phonenumber }}" disabled>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-envelope"></i>
                                </span>
                            </div>

                            <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ $beneficiary->email }}" disabled>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('benefactor') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-hand-holding-heart"></i>
                                </span>
                            </div>

                            <input id="benefactor" name="benefactor" type="text" class="form-control" placeholder="Benefactor..." value="Benefactor: {{ $benefactor->identification }} - {{ $benefactor->name }} {{ $benefactor->lastname }}" disabled>

                        </div>
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