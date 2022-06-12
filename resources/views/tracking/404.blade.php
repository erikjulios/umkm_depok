@extends('layouts.app')
@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                    <a href="{{ url('tracking-pesanan')}}"></i> Pesanan</a>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="row">      
            <div class="col-lg-12">    
                  <!-- Pending  -->
 
                <div class="card konfir-co" style="background: #325288">
                    <div class="card-body">
                          
                        <div class="row justify-content-center">
                            <div class="col-lg-10 daftar-produk">
                                <div class="row produks">
                                    <div class="col">
                                        <ul>
                                           	<li>Pesanan tidak ada</li>
                                        </ul>
                                    </div>         
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb Section end -->
@include('layouts.footer')
@endsection


