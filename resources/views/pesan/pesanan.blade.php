@extends('layouts.app')
@section('content')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                    <span>Pesanan</span>
                </div>
            </div>
        </div>
        <div class="track-main">
        <div class="track-icon">
            <a href="#"><i class="bi bi-wallet2"></i></a>
            <p>Belum Bayar</p>
        </div>
        <div class="track-icon">
            <a href="#"><i class="bi bi-box2"></i></a>
            <p>Dikemas</p>
        </div>
        <div class="track-icon">
            <a href="#"><i class="bi bi-truck"></i></a>
            <p>Dikirim</p>
        </div>
    </div>
        
    </div>
</div>


@include('layouts.footer')
@endsection