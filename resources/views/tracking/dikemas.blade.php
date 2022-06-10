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
                    <span>Dikemas</span>

                </div>
            </div>
        </div>

        <div class="row">      
            <div class="col-lg-12">    
                  <!-- Pending  -->
                @if ($dikemas == "[]")
                    <p style="font-weight: bold; font-size: 25px; padding-top: 100px">Pesanan kosong</p>
                @else
                @foreach($dikemas as $x)
                <div class="card konfir-co" style="background: grey">
                    <div class="card-body">
                          <b>Dikemas</b>
                        <div class="row justify-content-left">
                            <div class="col-lg-10 daftar-produk">
                                <div class="row produks">
                                    <div class="col">
                                        <hr>
                                        <ul>
                                            <li>order id : {{$x->order_id}}</li>
                                            <li>Nominal : Rp.{{number_format($x-> nominal_transaksi)}}</li>
                                            <li>Status : {{$x->status}}</li>
                                            <li>Payment : {{$x->payment_type}}</li><br>
                                            <p style="font-weight: bold; font-size: 15px; color: black">Pesanan anda sedang dikemas.</p>         
                                        </ul>
                                    </div>         
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb Section end -->
@include('layouts.footer')
@endsection

