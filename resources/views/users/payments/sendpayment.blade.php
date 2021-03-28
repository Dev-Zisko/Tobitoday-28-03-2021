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
            <h6 style="text-align: center; color: #FF6723 !important;" class="m-0 font-weight-bold text-primary">Envíar Remesa</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <form style="margin: 0 auto;" class="form-login" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header card-header-primary text-center">
                <div class="social-line">
                    <h3 style="color: #FF6723">Tasa del día: {{ number_format($rate['rate'], 2, ',', '.') }} Bs</h3>

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
                                    <i style="color: #FF6723;" class="fa fa-fw fa-euro-sign"></i>
                                </span>
                            </div>

                            <input id="amount" name="amount" type="number" step="any" class="form-control" placeholder="Monto a envíar (Є)..." value="{{ old('amount') }}" onInput="updateAmountbs(this.value, {{ $rate->rate }})" required>
                    
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i style="color: #FF6723;" class="fa fa-fw fa-exchange-alt"></i>
                                </span>
                            </div>

                            <input id="amountbs" name="amountbs" type="text" class="form-control" placeholder="Cambio a bolívares, según tasa..." value="{{ old('amountbs') }}" disabled>

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

                            <select type="text" id="method" name="method" class="form-control" required>
                                @foreach($methods as $method)
                                    <option value="{{ $method->name }}">{{ $method->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        @if ($errors->has('method'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('method') }}</strong>
                            </span>
                        @endif
                    </div>

                    <label class="label-form">Subir imagen de la transferencia o voucher</label>
                    <div class="form-group{{ $errors->has('voucher') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">

                            <input id="voucher" name="voucher" type="file" class="form-control" value="{{ old('voucher') }}" required>

                        </div>
                        @if ($errors->has('voucher'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('voucher') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="footer text-center">
                <button style="color: #FF6723;" type="submit" class="btn btn-outline-dark"><i style="color: #FF6723;" class="fa fa-fw fa-share"></i> Envíar</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
  <script type="text/javascript">

    function updateAmountbs (amount, rate){
        var newAmount = amount * rate;
        newAmount = number_format(newAmount, 2, ',', '.');
        document.getElementById("amountbs").value = newAmount + " Bs";
    }

    function number_format (number, decimals, decPoint, thousandsSep) {
      number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
      const n = !isFinite(+number) ? 0 : +number
      const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
      const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
      const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
      let s = ''
      const toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
          return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
          const arr = ('' + n).split('e')
          let sig = ''
          if (+arr[1] + prec > 0) {
            sig = '+'
          }
          return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
      }
      
      s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
      }
      return s.join(dec)
    }
  </script>
@endsection