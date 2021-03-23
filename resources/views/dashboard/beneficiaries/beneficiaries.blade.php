@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Beneficiarios</h1>
    <a href="{{ url('crear-beneficiario', Crypt::encrypt($benefactor->id)) }}" style="background-color: #FF6723; border-color: #FF6723;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Crear beneficiario</a>
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
                <input style="margin-bottom: 25px; float: right;" id="searchTerm" placeholder="Buscar en la tabla..." type="text" onkeyup="doSearch()" />
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Identificación</th>
                      <th>Nombre Completo</th>
                      <th>Banco - Numero de cuenta</th>
                      <th>Email</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary['identification'] }}</td>
                            <td>{{ $beneficiary['name'] }} {{ $beneficiary['lastname'] }}</td>
                            <td>{{ $beneficiary['bank'] }} - {{ $beneficiary['number_account'] }}</td>
                            <td>{{ $beneficiary['email'] }}</td>
                            <td>
                                <a href="{{ url('editar-beneficiario',  Crypt::encrypt($beneficiary['id'])) }}"><i style="color: #FF6723;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{ url('eliminar-beneficiario', Crypt::encrypt($beneficiary['id'])) }}"><i style="color: #FF6723;" class="fa fa-fw fa-trash"></i></a>
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

@section('scripts')
  <script type="text/javascript">
    function doSearch() {
        var tableReg = document.getElementById('dataTable');
        var searchText = document.getElementById('searchTerm').value.toLowerCase();
        for (var i = 1; i < tableReg.rows.length; i++) {
            var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                    found = true;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                tableReg.rows[i].style.display = 'none';
            }
        }
    }
  </script>
@endsection