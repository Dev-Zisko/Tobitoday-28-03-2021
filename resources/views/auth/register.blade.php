<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Registrar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/auth/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{ URL::asset('assets/auth/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/auth/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/auth/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="{{ url('/') }}">
                                        <span><img src="{{ URL::asset('assets/auth/images/logo tobitoday-02.png')}}" alt="" height="100"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Aún no tienes una cuenta? Crea tu cuenta, toma menos de un minuto.</p>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" type="text" id="name" placeholder="Ingresa tu nombre">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Apellido</label>
                                        <input class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname')}}" autocomplete="lastname" type="text" id="lastname" placeholder="Ingresa tu apellido" required>
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="identification">Identificación (C.I./DNI/PASAPORTE/PPS)</label>
                                        <input class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification')}}" autocomplete="identification" type="text" id="identification" placeholder="Ingresa tu número de identificación" required>
                                        @error('identification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="country">País</label>

                                        <select type="text" id="country" name="country" class="form-control" required>
                                            @foreach($countries as $country)
                                                @if($country->name == "United States")
                                                    <option value="{{ $country->acronym }}" selected>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->acronym }}">{{ $country->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu correo electrónico">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingresa tu contraseña">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="password-confirm">Repetir Contraseña</label>
                                        <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password-confirm" placeholder="Ingresa tu contraseña">
                                        @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                            <label class="custom-control-label" for="checkbox-signup">Yo, acepto los <a href="javascript: void(0);" class="text-dark">Términos y condiciones</a></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Registrarme </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Ya tienes una cuenta?  <a href="{{ route('login') }}" class="text-white ml-1"><b>Ingresar</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <a href="" class="text-white-50">2021 &copy; </a> <a href="" class="text-white-50">Tobitoday</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{ URL::asset('assets/auth/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('assets/auth/js/app.min.js')}}"></script>
        
    </body>
</html>

