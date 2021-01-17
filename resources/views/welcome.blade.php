<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap"
        rel="stylesheet"
    />
    <title>Slide Animation</title>

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/css/Header-Blue--Sticky-Header--Smooth-Scroll.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/css/fullpage.min.css')}} ">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.1/css/all.css" type="text/css">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/css/Navigation-with-Search.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
          integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
          crossorigin="anonymous"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/s.css')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

</head>

<body>
<main id="fullpage">
    <section style="background-color:red;padding-top:0;" class="section fp-auto-height-responsive  s1">
        <div  class="header-blue " style="height: 100vh" >
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" data-aos="fade-right"
                 data-aos-delay="1000" >
                <div class="container-fluid" >
                    <a class="navbar-brand d-flex" href="#">
                        <div>
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%" viewBox="0 0 338.000000 316.000000"
                                 preserveAspectRatio="xMidYMid meet" style="height: 2em;width: 2em ;" class="">

                                <g transform="translate(-80,370) scale(0.15,-0.15)"
                                   fill="#ffffffff" stroke="none">
                                    <path d="M1147 1962 c-202 -202 -367 -372 -367 -377 0 -6 157 -167 350 -360
l350 -349 40 39 c22 21 40 44 40 50 0 5 -135 145 -300 310 -165 165 -300 304
-300 310 0 6 51 61 114 124 97 97 116 112 132 103 11 -6 149 -141 309 -301
159 -160 294 -291 300 -291 6 0 28 17 48 38 l37 37 -296 295 c-162 162 -300
303 -306 314 -9 16 6 35 103 132 63 63 120 114 129 114 8 0 151 -136 317 -302
l303 -302 40 39 c22 21 40 44 40 50 0 16 -683 695 -700 695 -8 0 -180 -165
-383 -368z"/>
                                    <path d="M1831 2286 c-18 -19 -32 -39 -30 -45 2 -6 138 -145 302 -309 163
-164 297 -303 297 -308 0 -12 -232 -244 -245 -244 -5 0 -148 138 -317 307
l-308 308 -42 -43 -43 -42 310 -310 309 -309 -122 -123 -122 -123 -310 310
-310 310 -45 -45 -45 -45 353 -353 353 -353 372 373 c205 205 373 376 375 380
2 8 -682 698 -692 698 -4 0 -22 -15 -40 -34z"/>
                                </g>
                            </svg>
                            <span class="pl-2" style="border-left : 0.1em solid #fff;">ENSET Event</span></div>
                    </a>
                   
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest


                            @if (Route::has('register'))
                                <li class="nav-item mr-1">
                                <a class="btn btn-outline-light sign " role="button" href="{{ route('register') }}">Inscription</a>  
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                     <span class=" mr-2"> <a class="login-button   "  href="{{ route('login') }}">Connexion </a> </span>
                                </li>
                            @endif
                        @else
                        <li class="nav-item active mr-5 ">
                        <a class="nav-link " href="/p/create" title="New post"><i class="fas fa-plus" style="font-size:21px; color: #fff;"></i> </a>
                      </li>
                      <li class="nav-item active mr-5 ">
                        <a class="nav-link " href="{{ url('/') }}" title="Home"><i class="fas fa-home " style="font-size: large; color: #fff;"></i> </a>
                      </li>
                      <li class="nav-item mr-5">
                        <a class="nav-link" href="/profile/{{Auth::user()->id}}" title="Profile"><i class="fas fa-user" style="font-size: large; color: #fff;"></i></a>
                      </li>
                      <li class="nav-item mr-5 ">
                        <a class="nav-link" href="/contact" style="color: #fff;"><i class="fas fa-paper-plane" style="font-size: large; color: #fff;"></i></a>
                      </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff;">
                                    {{ Auth::user()->profile->pseudo_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
                </div>
            </nav>
            <div  style="position: relative;">
                <div class="row m-5" >
                    <div class="col-md-12 col-12 col-xl-6" id="text">

                        <h1 class=" typing" style="color: white;font-size: 5vh">EnsetEvent est votre vitrine sur ce qui se passe à l'école et les événements du moment.</h1>
                        <button class="btn btn-outline-light sign mt-3" >Commencer Maintenant!</button>
                    </div>
                    <div class="col-md-12 col-12 col-xl-6 " >
                        <img src="{{asset("assets/img/PrIllustration.png")}}" style="width:100%;" ></div>
                </div>


            </div>


            <svg style="position: absolute;bottom:0%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#fff" fill-opacity="1"
                                                                                                                      d="M0,0L80,32C160,64,320,128,480,133.3C640,139,800,85,960,80C1120,75,1280,117,1360,138.7L1440,160L1440,320L1360,320C1280,
        320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,319Z"></path></svg>
        </div></section>

    <section class="section s2 fp-auto-height-responsive " style="background-color:#BBE0FF;padding:0">
        <div   class="container text "  >

            <h3 class="pt-5" style="color:#454d55; text-align: center">Comment ça Marche?</h3>

            <h1 style="color:darkblue; text-align: center">Planification et gestion d'événements. Simplifiées.</h1>

            <p style="text-align:center;font-size: 1.5rem;color:#454d55">Notre plateforme de gestion d'événements vous offre une puissante série d'outils pour réussir vor
                événements et générer un impact sur vos participants. Cela semble trop beau pour être vrai ? Voyez comment ça marche</p>

        </div>
        <div class="row p-3 s-comment " style="margin-top: 8%;">


            <div class="col-12 col-md-3 text-center">

                <img  class=" images "  src="assets/img/create_profile.gif"  alt="" >
                <h3>Connectez-vous!</h3>
            </div>
            <div class=" col-12 col-md-3  text-center ">
                <img   src="assets/img/fill_event.gif"  class="images" />
                <h3>Complétez les données</h3>

            </div>
            <div class=" col-12 col-md-3  text-center ">
                <img  src="assets/img/launch.gif"  class="images" />
                <h3>Lancer l’événement</h3>

            </div>
            <div class=" col-12 col-md-3  text-center ">
                <img   src="assets/img/observe.gif"  class="images" />
                <h3>Laissez la magie opérer!!!</h3>
            </div>
        </div>
    </section>

    <section class="section fp-auto-height-responsive  s3 pt-5"> <div class="container h-100">
            <div class="row">
                <div class="col-md-11 ">
                    <h2 class="text-center margin-bottom-2em" ><b>Conçu pour la promotion de toute sorte d'événements</b></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-primary">
                            <i class="fal fa-id-badge fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Collectes de fonds et réunions d’anciens élèves</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div class="icon icon-circle icon-warning">
                            <i class="fal fa-graduation-cap fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Débuts et remises de diplômes</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-info">
                            <i class="fal fa-users fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Conférences et symposiums</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-warning">
                            <i class="fal fa-users-class fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Réunions du corps professoral</b></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-success">
                            <i class="fal fa-wine-glass-alt fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Galas et dîners</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div class="icon icon-circle icon-danger">
                            <i class="fal fa-id-card-alt fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Événements de réseautage</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-success">
                            <i class="fal fa-chalkboard-teacher fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Orientations et événements parentaux</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-danger">
                            <i class="fal fa-award fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Banquets de reconnaissance</b></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div  class="icon icon-circle icon-info">
                            <i class="fal fa-comments fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Salons de recrutement</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div class="icon icon-circle icon-danger">
                            <i class="fal fa-keynote fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Séminaires et cours</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div class="icon icon-circle icon-warning">
                            <i class="fal fa-golf-ball fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Evénements sportifs</b></h5>
                </div>
                <div class="col-6 col-md-3 text-center margin-bottom-4em">
                    <div class="info" style="padding:0;">
                        <div class="icon icon-circle icon-success">
                            <i class="fal fa-user-graduate fa-lg"></i>
                        </div>
                    </div>
                    <h5><b>Inscription des étudiants</b></h5>
                </div>
            </div>
        </div></section>



</main>
<!--div class="intro">
    <div class="intro-text">
        <h1 class="hide">
            <span class="text">Creating inovation</span>
        </h1>
        <h1 class="hide">
            <span class="text">For Everyday</span>
        </h1>
        <h1 class="hide">
            <span class="text">people.</span>
        </h1>
    </div>
</div>

<div class="slider"></div-->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
    crossorigin="anonymous"
></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/bs-init.js')}}"></script>
<script src="{{asset('assets/js/fullpage.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous"></script>
<script>
    AOS.init();
</script>
<script src="{{asset("js/p.js")}}"></script>
</body>
</html>
