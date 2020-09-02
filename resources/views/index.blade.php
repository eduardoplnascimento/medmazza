<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nosso principal objetivo é que nossos pacientes encontrem o médico perfeito e agende uma consulta do modo mais fácil possível. Essa jornada precisa ser agradável, por isso sempre estamos dispostos a ajudar." />
        <meta name="keywords" content="medico, agendar, consulta, online, agendar consulta, clinica"/>
        <meta name="author" content="Eduardo Nascimento"/>
        <title>MedMazza | Agendamento de Consultas Online</title>
        <link rel="icon" href="{{ asset('img/landing/favicon.png') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/bootstrap.min.css') }}">
        <!-- animate CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/animate.css') }}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/owl.carousel.min.css') }}">
        <!-- themify CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/themify-icons.css') }}">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/flaticon.css') }}">
        <!-- magnific popup CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/magnific-popup.css') }}">
        <!-- nice select CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/nice-select.css') }}">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/slick.css') }}">
        <!-- style CSS -->
        <link rel="stylesheet" href="{{ asset('css/landing/style.css') }}">
    </head>
    <body>
        <!--::header part start::-->
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ route('index') }}"> <img src="{{ asset('img/landing/logo.png') }}"
                                    alt="logo"> MedMazza
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item justify-content-center"
                                id="navbarSupportedContent">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">Sobre</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#services">Serviços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#doctors">Médicos</a>
                                    </li>
                                </ul>
                            </div>
                            <a class="btn_2 d-none d-lg-block" href="{{ route('login') }}">Entrar</a>
                            <a class="btn d-none d-lg-block" href="{{ route('register') }}">Registrar</a>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header part end-->

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xl-5">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h5>Estamos aqui para você</h5>
                                <h1>Melhores Médicos</h1>
                                <p>Aqui na MedMazza você encontra os melhores médicos da região,
                                    com um atendimento diferenciado e um agendamento muito fácil.</p>
                                <a href="{{ route('login') }}" class="btn_2">Agende sua consulta</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner_img">
                            <img src="{{ asset('img/landing/doctors1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->

        <!-- about us part start-->
        <section class="about_us padding_top" id="about">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="about_us_img">
                            <img src="{{ asset('img/landing/calendar.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="about_us_text">
                            <h2>Sobre Nós</h2>
                            <p>Nosso principal objetivo é que nossos pacientes encontrem o médico
                                perfeito e agende uma consulta do modo mais fácil possível. Essa jornada
                                precisa ser agradável, por isso sempre estamos dispostos a ajudar. </p>
                            <div class="banner_item">
                                <div class="single_item">
                                    <img src="{{ asset('img/landing/icon/banner_1.svg') }}" alt="">
                                    <h5>Médicos</h5>
                                </div>
                                <div class="single_item">
                                    <img src="{{ asset('img/landing/icon/banner_2.svg') }}" alt="">
                                    <h5>Agendamento</h5>
                                </div>
                                <div class="single_item">
                                    <img src="{{ asset('img/landing/icon/banner_3.svg') }}" alt="">
                                    <h5>Qualificados</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us part end-->

        <!-- feature_part start-->
        <section class="feature_part" id="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section_tittle text-center">
                            <h2>Nossos Serviços</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-3 col-sm-12">
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><img src="{{ asset('img/landing/children.png') }}"
                                        alt=""></span>
                                <h4>Pediatria</h4>
                                <p>Nossa missão é oferecer suporte preventivo,
                                    para que crianças e adolescentes
                                    cresçam saudáveis e felizes.</p>
                            </div>
                        </div>
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><img src="{{ asset('img/landing/heart.png') }}"
                                        alt=""></span>
                                <h4>Cardiologia</h4>
                                <p>Nossos médicos cardiologistas são altamente qualificados
                                    para identificação das doenças de um dos principais
                                    orgãos do corpo humano.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="single_feature_img">
                            <img src="{{ asset('img/landing/doctors2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><img src="{{ asset('img/landing/eye.png') }}"
                                        alt=""></span>
                                <h4>Oftalmologia</h4>
                                <p>O cuidado com as doenças que acometem os olhos e a
                                    visão são conduzidos pelos nosso médicos oftalmologistas.</p>
                            </div>
                        </div>
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><img src="{{ asset('img/landing/bone.png') }}"
                                        alt=""></span>
                                <h4>Ortopedia</h4>
                                <p>Nossos ortopedistas cuidaram dos seus ossos, músculos, articulações,
                                    ligamentos e outros componentes do seu sistema.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature_part start-->

        <!-- our depertment part start-->
        <section class="our_depertment section_padding" id="doctors">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-12">
                        <div class="depertment_content">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <h2>Nossos Médicos</h2>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <img src="{{ asset('img/landing/doctor/doctor_1.png') }}" alt="doctor">
                                            <h3>Dr. José Silva</h3>
                                            <p>Cardiologista</p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <img src="{{ asset('img/landing/doctor/doctor_2.png') }}" alt="doctor">
                                            <h3>Dr. Matheus Souza</h3>
                                            <p>Pediatra</p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <img src="{{ asset('img/landing/doctor/doctor_3.png') }}" alt="doctor">
                                            <h3>Dr. Alan Turing </h3>
                                            <p>Oftalmologista</p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <img src="{{ asset('img/landing/doctor/doctor_4.png') }}" alt="doctor">
                                            <h3>Dr. Aparecido Ponce</h3>
                                            <p>Ortopedista</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our depertment part end-->

        <!-- footer part start-->
        <footer class="footer-area">
            <div class="copyright_part">
                <div class="container">
                    <div class="row align-items-center">
                        <p class="footer-text m-0 col-lg-8 col-md-12">
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </p>
                        <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"> <i class="ti-twitter"></i> </a>
                            <a href="#"><i class="ti-instagram"></i></a>
                            <a href="#"><i class="ti-skype"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer part end-->

        <!-- jquery plugins here-->
        <script src="{{ asset('js/landing/jquery-1.12.1.min.js') }}"></script>
        <!-- popper js -->
        <script src="{{ asset('js/landing/popper.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('js/landing/bootstrap.min.js') }}"></script>
        <!-- owl carousel js -->
        <script src="{{ asset('js/landing/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/landing/jquery.nice-select.min.js') }}"></script>
        <!-- contact js -->
        <script src="{{ asset('js/landing/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/landing/jquery.form.js') }}"></script>
        <script src="{{ asset('js/landing/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/landing/mail-script.js') }}"></script>
        <script src="{{ asset('js/landing/contact.js') }}"></script>
        <!-- custom js -->
        <script src="{{ asset('js/landing/custom.js') }}"></script>
    </body>
</html>
