<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Error 404</title>
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
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="error-text-box">
                                    <svg viewBox="0 0 600 200">
                                        <!-- Symbol-->
                                        <symbol id="s-text">
                                            <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                                        </symbol>
                                        <!-- Duplicate symbols-->
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h3 class="mt-4">Página no encontrada!</h3>
                                    <p class="text-muted mb-0">Parece que te has equivocado de rumbo. No te preocupes ... 
                                        nos pasa a los mejores. Es posible que desee comprobar su conexión a Internet. 
                                        Aquí tienes un pequeño consejo que podría ayudarte a retomar el rumbo.</p>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Volver a la <a href="{{ url('/') }}" class="text-white ml-1"><b>Página Principal</b></a></p>
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
            2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{ URL::asset('assets/auth/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('assets/auth/js/app.min.js')}}"></script>

    </body>

</html>