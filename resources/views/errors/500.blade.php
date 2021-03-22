<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Error 500</title>
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
                                    <div class="text-center mt-4">
                                    <h1 class="text-error">500</h1>
                                    <h3 class="mt-3 mb-2">Error Interno del Servidor</h3>
                                    <p class="text-muted mb-3">¿Por qué no intentas actualizar tu página?</p>

                                    <a href="{{ url('/') }}" class="btn btn-success waves-effect waves-light">Volver a la Página Principal</a>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{ URL::asset('assets/auth/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('assets/auth/js/app.min.js')}}"></script>
    </body>
</html>