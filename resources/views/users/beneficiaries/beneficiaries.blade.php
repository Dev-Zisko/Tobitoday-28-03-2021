@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Beneficiarios</h1>
    <a href="{{ route('crear-mi-beneficiario') }}" style="background-color: #FF6723; border-color: #FF6723;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Crear beneficiario</a>
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
              <h6 style="text-align: center; color: #FF6723  !important;" class="m-0 font-weight-bold text-primary">Lista de Beneficiarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Identificación</th>
                      <th>Banco - Numero de cuenta</th>
                      <th>Email</th>
                      <th>Benefactor</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary['name'] }} {{ $beneficiary['lastname'] }}</td>
                            <td>{{ $beneficiary['identification'] }}</td>
                            <td>{{ $beneficiary['bank'] }} - {{ $beneficiary['number_account'] }}</td>
                            <td>{{ $beneficiary['email'] }}</td>
                            <td>{{ $beneficiary['benefactor'] }}</td>
                            <td>
                                <a href="{{url('editar-mi-beneficiario',Crypt::encrypt($beneficiary['id']))}}"><i style="color: #FF6723;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('eliminar-mi-beneficiario',Crypt::encrypt($beneficiary['id']))}}"><i style="color: #FF6723;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($beneficiaries) == 0)
                        <tr>
                            <td>No hay beneficiarios registrados aún</td>
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