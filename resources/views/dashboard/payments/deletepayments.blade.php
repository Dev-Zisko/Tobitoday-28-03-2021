@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Remesas</h1>
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
            <h6 style="text-align: center; color: #FF6723 !important;" class="m-0 font-weight-bold text-primary">Eliminar Remesa</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <form style="margin: 0 auto;" class="form-login" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header card-header-primary text-center">
                <div class="social-line">

                    <div class="form-group{{ $errors->has('benefactor') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-hand-holding-heart"></i>
                                </span>
                            </div>

                            <input id="benefactor" name="benefactor" type="text" class="form-control" placeholder="Benefactor..." value="Benefactor: {{ $benefactor->identification }} - {{ $benefactor->name }} {{ $benefactor->lastname }}" disabled>

                        </div>
                        @if ($errors->has('benefactor'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('benefactor') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('beneficiary') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>

                            <input id="beneficiary" name="beneficiary" type="text" class="form-control" placeholder="Beneficiario..." value="Beneficiario: {{ $beneficiary->identification }} - {{ $beneficiary->name }} {{ $beneficiary->lastname }}" disabled>

                        </div>
                        @if ($errors->has('beneficiary'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('beneficiary') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-dollar-sign"></i>
                                </span>
                            </div>

                            <input id="amount" name="amount" type="number" step="any" class="form-control" placeholder="Monto a envíar ($ o Є)..." value="{{ $payment->amount }}" disabled>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-exchange-alt"></i>
                                </span>
                            </div>

                            <input id="amountbs" name="amountbs" type="text" class="form-control" placeholder="Cambio a bolívares, según tasa..." value="{{ number_format($amountbs, 2, ',', '.') }} Bs" disabled>

                        </div>
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif

                        @if ($errors->has('amountbs'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('amountbs') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-credit-card"></i>
                                </span>
                            </div>

                            <input id="method" name="method" type="text" class="form-control" placeholder="Método de pago..." value="{{ $payment->method }}" disabled>

                        </div>
                        @if ($errors->has('method'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('method') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-bars"></i>
                                </span>
                            </div>

                            <input id="status" name="status" type="text" class="form-control" placeholder="Método de pago..." value="{{ $payment->status }}" disabled>

                        </div>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('status') }}</strong>
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