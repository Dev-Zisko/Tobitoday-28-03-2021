@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h5 mb-0 text-gray-800">Remesas</h1>
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
            <h6 style="text-align: center; color: #FF6723 !important;" class="m-0 font-weight-bold text-primary">Detalle de la Remesa</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <form style="margin: 0 auto;" class="form-login" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header card-header-primary text-center">
                <div class="social-line">

                    <h5><strong>Documento de identidad del Benefactor:</strong> {{ $benefactor->identification }}</h5>
                    <h5><strong>Nombres y Apellidos del Benefactor:</strong> {{ $benefactor->name }} {{ $benefactor->lastname }}</h5>
                    <h5><strong>Correo del Benefactor:</strong> {{ $benefactor->email }}</h5>
                    <br>
                    <h5><strong>Documento de identidad del Beneficiario:</strong> {{ $beneficiary->identification }}</h5>
                    <h5><strong>Nombres y Apellidos del Beneficiario:</strong> {{ $beneficiary->name }} {{ $benefactor->lastname }}</h5>
                    <h5><strong>Correo del Beneficiario:</strong> {{ $beneficiary->email }}</h5>
                    <br>
                    <h5><strong>Tasa del día de la transacción:</strong> {{ $payment->rate }}</h5>
                    <br>
                    <h5><strong>Monto (Є):</strong> {{ $payment->amount }}</h5>
                    <h5><strong>Monto (Bs):</strong> {{ $amountbs }}</h5>
                    <br>
                    <h5><strong>Método de pago:</strong> {{ $payment->method }}</h5>
                    <h5><strong>Estado de la operación:</strong> {{ $payment->status }}</h5>
                    <br>
                    <h5><strong>Imagen de la operación:</strong></h5>
                    <img width="60%" height="60%" src="../storage/{{ $payment->voucher }}" />
                    <br>
                    <br>
                    <br>
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Estatus</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-bars"></i>
                                </span>
                            </div>
                            <select type="text" id="status" name="status" class="form-control" required>
                                @if($payment->status == "Procesando el Pago")
                                    <option value="Procesando el Pago" selected>Procesando el Pago</option>
                                    <option value="Pagado">Pagado</option>
                                @else
                                    <option value="Procesando el Pago">Procesando el Pago</option>
                                    <option value="Pagado" selected>Pagado</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="footer text-center">
                <button style="color: #FF6723;" type="submit" class="btn btn-outline-dark"><i style="color: #FF6723;" class="fa fa-fw fa-save"></i> Guardar cambio</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection