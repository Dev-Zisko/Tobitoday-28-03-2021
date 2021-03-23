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
              <h6 style="text-align: center; color: #FF6723  !important;" class="m-0 font-weight-bold text-primary">Lista de Remesas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <input style="margin-bottom: 25px; float: right;" id="searchTerm" placeholder="Buscar en la tabla..." type="text" onkeyup="doSearch()" />
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Identificación - Nombre Benefactor</th>
                      <th>Identificación - Nombre Beneficiario</th>
                      <th>Monto ($ o Є)</th>
                      <th>Monto (Bs)</th>
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
                            <td>{{ number_format($payment['amountbs'], 2, ',', '.') }}</td>
                            @if($payment['status'] == "Por Verificar")
                              <td style="color: #FF6A00;">{{ $payment['status'] }}</td>
                            @else
                              <td style="color: #3AC400;">{{ $payment['status'] }}</td>
                            @endif
                            <td>
                                <a href="{{url('ver-remesa',Crypt::encrypt($payment['id']))}}"><i style="color: #FF6723;" class="fa fa-fw fa-eye"></i></a>
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