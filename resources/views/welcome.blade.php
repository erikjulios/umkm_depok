<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="UTF-8" />
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Umkm Depokk</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

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
    </head>
    <body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section" >
        <div class="header-top" style="background: #325288">
            <div class="container">
                <div class="ht-left" >
                    <strong>
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i> iwapi@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i> +628 12345
                    </div>
                    </strong>
                </div>
            </div>
        </div>
        <div class="container" >
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <center>
                            <a href="#">
                                <img src="img/iwapi_logo.jpg" alt="" width="80" height="80" />
                            </a>
                            </center>
                        </div>
                        </div>
                            <div class="col-md-8 mx-auto" >
                                <center>
                                <h2><strong> Iwapi Depok Store</strong></h2>
                                </center>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/Dimsum.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Contoh</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="{{ route('login') }}" class="primary-btn">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/browker.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Official</span>
                            <h1>Iwapi Depok Store</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="{{ route('login') }}" class="primary-btn">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/biji ketapang.jpg" alt="" />
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Cemilan</div>
                                <a href="#">
                                    <h5>Biji Ketapang</h5>
                                </a>
                                <div class="product-price">
                                    Rp.123
                                    <span>Rp.345</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/Dapur Salsa (Coklat Keju) (2).jpg" alt="" />
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Kue</div>
                                <a href="#">
                                    <h5>Bolu</h5>
                                </a>
                                <div class="product-price">
                                    Rp.123
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/Daffiz147 (Lemon Jahe).jpg" alt="" />
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Minuman</div>
                                <a href="#">
                                    <h5>Lemon Jahe</h5>
                                </a>
                                <div class="product-price">
                                    Rp.124
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/Daffiz147 (Leci Jelly).jpg" alt="" />
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Minuman</div>
                                <a href="#">
                                    <h5>Leci Jelly</h5>
                                </a>
                                <div class="product-price">
                                    Rp.123
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Iwapi_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Iwapi_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Iwapi_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Iwapi_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Iwapi_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Iwapi_gallery</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
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
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
