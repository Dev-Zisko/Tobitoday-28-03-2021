@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Remesas</h1>
    <a href="{{ route('crear-remesa') }}" style="background-color: #FF6723; border-color: #FF6723;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Crear remesa</a>
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
              <h6 style="text-align: center; color: #FF6723  !important;" class="m-0 font-weight-bold text-primary">Lista de Remesas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Identificación - Nombre Benefactor</th>
                      <th>Identificación - Nombre Beneficiario</th>
                      <th>Monto</th>
                      <th>Método de pago</th>
                      <th>Estatus</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment['benefactor'] }}</td>
                            <td>{{ $payment['beneficiary'] }}</td>
                            <td>{{ $payment['amount'] }}</td>
                            <td>{{ $payment['method'] }}</td>
                            <td>{{ $payment['status'] }}</td>
                            <td>
                                <a href="{{url('editar-remesa',Crypt::encrypt($payment['id']))}}"><i style="color: #FF6723;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('ver-remesa',Crypt::encrypt($payment['id']))}}"><i style="color: #FF6723;" class="fa fa-fw fa-eye"></i></a>
                                <a href="{{url('eliminar-remesa',Crypt::encrypt($payment['id']))}}"><i style="color: #FF6723;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($payments) == 0)
                        <tr>
                            <td>No hay remesas registradas aún</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection