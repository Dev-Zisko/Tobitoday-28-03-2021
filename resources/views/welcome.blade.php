<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>TobiToday</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Envios de remesas hacia Venezuela" name="description" />
        <meta content="Luis Da Silva" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/landing/images/favicon.png')}}">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/landing/css/bootstrap.min.css')}}" type="text/css">

        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/landing/css/materialdesignicons.min.css')}}" />

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/landing/css/style.css')}}" />

    </head>

    <body>

        <!--Navbar Start-->
        <nav  class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index.html">
                    <img src="{{ URL::asset('assets/landing/images/logo-home-light.png')}}" alt="" class="logo-light" height="20%" width="20%"/>
                    <img src="{{ URL::asset('assets/landing/images/logo-home.png')}}" alt="" class="logo-dark" height="20%" width="20%" />
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div style="font-size: 1.2em;" class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link"></a>
                        </li> 
                        <li class="nav-item">
                            <a href="#nosotros" class="nav-link">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a href="#faq" class="nav-link">Faqs</a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        
                        @auth
                            <a style="margin-left: 15px;" href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                        @else
                            <!--<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a> -->
                            <a style="margin-left: 15px;" class="btn btn-info navbar-btn" href="{{ route('login') }}">Ingresar</a>
                            @if (Route::has('register'))
                            
                            <!--<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>-->
                        @endif
                    @endauth
                      
                    @endif
                    <!--<button class="btn btn-info navbar-btn" >Ingresar</button>-->
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- home start -->
        <section class="bg-home bg-gradient" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="home-title mo-mb-20">
                                    <h1 class="mb-4 text-white">Tasa del Dia: 1.100.000 Bs. $/€</h1>
                                    <!-- en la tasa del dia enviar variable de tasa a esta vista-->
                                    <!--<p class="text-white-50 home-desc mb-5">Ubold is a fully featured premium admin template built on top of awesome Bootstrap 4.1.3, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. </p>
                                    -->
                                    </div>
                            </div>
                            <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-7">
                                <div class="home-img position-relative">
                                    <img src="{{ URL::asset('assets/landing/images/favicon.png')}}" alt="" class="home-first-img">
                                    <img src="{{ URL::asset('assets/landing/images/favicon.png')}}" alt="" class="home-second-img mx-auto d-block">
                                    <img src="{{ URL::asset('assets/landing/images/favicon.png')}}" alt="" class="home-third-img">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
            </div>
        </section>
        <!-- home end -->

        <!-- features start -->
        <section class="section" id="nosotros">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4 pb-1">
                            <h3>¿Que es TobiToday?</h3>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-img">
                            <img src="{{URL::asset('assets/landing/images/features-img/envio.jpg')}}" alt="" height="18" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5 features-content">
                            <h3 class="mb-3">Envio de remesas</h3>
                            <p class="text-muted mb-4">
                                Con TobiToday puedes enviar remesas a tus familiares en venezuela, desde cualquier parte de Europa o de Estados Unidos!
                            </p>
                            <a href="#" class="btn btn-primary btn-sm">Enviar Remesa <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row align-items-center mt-5">
                    <div class="col-lg-6">
                        <div class="p-5 features-content">
                            <h3 class="mb-3">Con la Tasa mas competitiva del mercado</h3>
                            <p class="text-muted mb-4">
                                En TobiToday te aseguramos una tasa 100% competitiva, con el envio de remesas rapidas y seguras! 
                            </p>
                            <a href="#" class="btn btn-primary btn-sm">Enviar Remesa<i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="feature-img">
                            <img src="{{URL::asset('assets/landing/images/features-img/cambio.jpg')}}" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- features end -->

        <!-- faqs start -->
        <section class="section bg-light" id="faq">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-5">
                            <h3>Frequently Asked Questions</h3>
                            <p class="text-muted">At solmen va esser necessi far uniform grammatica.</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-5 offset-lg-1">
                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question">What is Lorem Ipsum?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>

                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question">Why use Lorem Ipsum?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Lorem ipsum dolor sit amet, in mea nonumes dissentias dissentiunt, pro te solet oratio iriure. Cu sit consetetur moderatius intellegam, ius decore accusamus te. Ne primis suavitate disputando nam. Mutat convenirete.</p>
                        </div>

                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question">How many variations exist?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>

                    </div>
                    <!--/col-lg-5 -->

                    <div class="col-lg-5">
                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question">Is safe use Lorem Ipsum?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>

                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question">When can be used?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Lorem ipsum dolor sit amet, in mea nonumes dissentias dissentiunt, pro te solet oratio iriure. Cu sit consetetur moderatius intellegam, ius decore accusamus te. Ne primis suavitate disputando nam. Mutat convenirete.</p>
                        </div>

                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question">License &amp; Copyright</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>

                    </div>
                    <!--/col-lg-5-->
                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->
        </section>
        <!-- faqs end -->

        <!-- contact start -->
        <section class="section pb-0 bg-gradient" id="contact">
            <div class="bg-shape">
                <img src="images/bg-shape-light.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title text-center mb-4">
                            <h3 class="text-white">Have any Questions ?</h3>
                            <p class="text-white-50">Please fill out the following form and we will get back to you shortly</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <div class="contact-content text-center mt-4">
                            <div class="contact-icon mb-2">
                                <i class="mdi mdi-email-outline text-info h2"></i>
                            </div>
                            <div class="contact-details text-white">
                                <h5 class="text-white">E-mail</h5>
                                <p class="text-white-50">tobitoday5@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="contact-content text-center mt-4">
                            <div class="contact-icon mb-2">
                                <i class="mdi mdi-cellphone-iphone text-info h2"></i>
                            </div>
                            <div class="contact-details">
                                <h5 class="text-white">Phone</h5>
                                <p class="text-white-50">+353 83 151 1400</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="contact-content text-center mt-4">
                            <div class="contact-icon mb-2">
                                <i class="mdi mdi-map-marker text-info h2"></i>
                            </div>
                            <div class="contact-details">
                                <h5 class="text-white">Address</h5>
                                <p class="text-white-50">25-33 Popes Quay, Shandon, Cork, Irlanda</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="custom-form p-5 bg-white">
                            <div id="message"></div>
                            <form method="post" action="php/contact.php" name="contact-form" id="contact-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter your name...">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email...">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input name="subject" id="subject" type="text" class="form-control" placeholder="Enter Subject...">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="comments">Message</label>
                                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter your message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-danger" value="Send Message">
                                        <div id="simple-msg"></div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                        <!-- end custom-form -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- contact end -->
        <section class="section pb-0 bg-gradient">
            <div>
            </div>
        </section>
        <!-- footer start -->
        <footer class="bg-dark footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="float-left pull-none">
                            <p class="text-white-50" href="http://methodologic.com.ve/">2020 Design by Methodologic 🤍</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="float-right pull-none">
                            <ul class="list-inline social-links">
                                <li class="list-inline-item text-white-50">
                                    Social :
                                </li>
                                <li class="list-inline-item"><a href="https://www.facebook.com/tobitodayremesas/"><i class="mdi mdi-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/tobito.day/"><i class="mdi mdi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </footer>
        <!-- footer end -->
        
        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>

        <!-- javascript -->
        <script src="{{ URL::asset('assets/landing/js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('assets/landing/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ URL::asset('assets/landing/js/jquery.easing.min.js')}}"></script>
        <script src="{{ URL::asset('assets/landing/js/scrollspy.min.js')}}"></script>

        <!-- custom js -->
        <script src="{{ URL::asset('assets/landing/js/app.js')}}"></script>
    </body>

</html>