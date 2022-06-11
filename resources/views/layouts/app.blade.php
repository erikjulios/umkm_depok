<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<<<<<<< HEAD
    
     <script src="/livewire/livewire.js" />
    <link href="select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="select2/dist/js/select2.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <title>{{ config('umkm_depok', 'Umkm depok') }}</title>
=======
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<<<<<<< HEAD
    <!--     template angga -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <!--     template angga -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/themify-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.css" type="text/css" />

<!--     slect2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    @livewireStyles
</head>
<body>

   
    @include('sweetalert::alert')
    
    
=======

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
<<<<<<< HEAD
                    <img src="{{ url('img/iwapi_logo.jpg')}}" width="50" height="50" alt="">
                </a>
                

                <div >
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" >
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item cart-icon">
                            <a  href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item cart-icon">
                            <a  href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item cart-icon">
                            <?php
                                 $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\DetailPemesanan::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
                            <a href="{{ url('check-out') }}">
                                <i class="bi bi-cart-check"></i>
                                @if(!empty($notif))
                                <span >{{ $notif }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item cart-icon">
                            <a>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="cart-hover" >
                                <p>Akun</p>                                  
                                <a class="sub-menu" href="{{ url('profile') }}">Profil</a>
                                <a class="sub-menu" href="#">Pesanan</a>
                                <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
=======
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<<<<<<< HEAD
=======

>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<<<<<<< HEAD
     


       <!--  <script>
            $(document).ready(function(){
                // $.ajaxSetup({
                //   headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //   }
                // });
                    $.ajax({
                    type :'post',
                    url  :  '/konfirmasi_co/',
                    success:function(hasil_provinsi)
                    {
                        $('select[name=nama_provinsi]').html(hasil_provinsi);
                    }
                });

                $("select[name=nama_provinsi]").on("change",function(){
                    //ambil id prov
                    var id_prov_terpilih = $("option:selected",this).attr("id_provinsi");
                    $.ajax({
                        type : 'post'
                        url  :  '/konfirmasi_co/',
                    });
                    alert(id_prov_terpilih);
                });
            });
        </script> -->
     @livewireScripts

=======
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
</body>
</html>
