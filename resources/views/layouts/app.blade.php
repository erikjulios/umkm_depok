<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
     <script src="/livewire/livewire.js" />
    <link href="select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="select2/dist/js/select2.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <title>{{ config('umkm_depok', 'Umkm depok') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
    

        <div class="container">
            <div class="navbar">
        <div class="logo">
        <img src="{{ url('img/iwapi_logo.jpg')}}" width="50" height="50" alt="">
        </div>
        <div class="menu">
         
            <!-- Authentication Links -->
                        <ul>
                        @guest
                        <li>
                            <a  href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li >
                            <a  href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                        @endif
                        @else
                    </ul>

                    <ul class="nav-right">
                            <li class="cart-icon">
                                <?php
                                 $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\DetailPemesanan::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
                                <a  href="{{ url('check-out') }}">
                                <i class="icon_bag_alt"></i>
                                @if(!empty($notif))
                                <span >{{ $notif }}</span>
                                @endif
                            </a>
                            </li>
                            <li class="cart-icon">
                                    <a>{{ Auth::user()->name }} &nbsp;</a>
                                
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <a href="{{ url('profile') }}">Profile</a>
                                                
                                                        </div>
                                                    </td>
                                                    
                                                   
                                                </tr>
                                                <tr>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                           
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                        </div>
                                                    </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </li>
                        </ul>
        </div>
    </div>
    @endguest
</div>
  
 
    <div id="app">
       
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Partner Logo Section End -->

<!-- Footer Section Begin 
<footer class="footer-section" style="background: #325288">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="#"><img src="img/iwapi_logo.jpg" alt="" /></a>
                    </div>
                    <ul>
                        <li>Alamat: Depok</li>
                        <li>No.telp: +628 12345</li>
                        <li>Email: email@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="footer-widget">
                    <h5>Informasi</h5>
                    <ul>
                        <li><a href="#">Tentang</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h5>Akun</h5>
                    <ul>
                        <li><a href="{{ route('login') }}">My Account</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="{{ route('login') }}">Belanja</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved ">
        <div class="container">
            <div class="row " >
                <div class="col-lg-12">
                    <div class="copyright-text ">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Hak Cipta | Iwapi Depok Store
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> 
Footer Section End -->
     

                        


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
    
</body>
</html>
