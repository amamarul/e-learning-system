<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DG Learning</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,300,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/app/bower_components/Swiper/dist/css/swiper.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="/app/bower_components/angular/angular.js"></script>
    <script src="/app/bower_components/Swiper/dist/js/swiper.min.js"></script>
    <script src="/index.js"></script>

</head>
<body class="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img width="250" src="/img/logo.png" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/onderwerpen') }}">categorieën</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Inloggen</a></li>
                <li><a href="{{ url('/register') }}">Registreren</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/profile') }}"><i class="fa"></i>Profiel</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Uitloggen</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="content">
    @yield('content')
</div>


@include('shared.modals')

<footer>
    <div class="container">
        <div class="footer-bottom">
            <div class="col-md-6">
                <div class="f-head-1">
                    © DGLearning 2016. All rights reserved.
                </div>
                <div class="f-head-2">
                    &copy; eHealthfabriek 2016.
                    psychoeducatieleren.nl is een initiatief van <a target="_blank" href="https://ehealthfabriek.nl/">eHealthfabriek</a>
                    <div class="col-md-6">
                        <div class="row">
                            <ul>
                                <li>Guido gezellestraat 25</li>
                                <li>6531CT Nijmegen</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>KVK: 66992508</li>
                            <li>BTW: NL856785076B01</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <a href="mailto:info@dgdigitaal.nl?subject=Vraag via DGLearning.nl" class="btn btn-secondary">Neem contact op</a>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="http://localhost:35729/livereload.js"></script>
<script src="/js/header.js"></script>
<script src="/js/back.js"></script>
<script src="/js/swiper.js"></script>

</body>
</html>
