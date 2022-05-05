@extends('layouts.app')
@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                    <a href="{{ url('check-out')}}"> Keranjang</a>
                    <a href="{{ url('konfirmasi_co') }}"> Check Out</a>
                    <span>Jasa Kirim</span>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

 @foreach ($hasil as $key)
<div class="col-md-4">
    <div class="card ongkir">
        <div class="card-header ongkir-header" >{{$key['name']}}</div>
        <div class="card-body text-center ">
            <h6 class="card-subtitle mb-2 text-muted">{{$key['description'] }}</h6><hr>
            <div class="row mt-2">
                <div class="col-md-12 col">
                    <h6><strong>Biaya : {{$key['biaya'] }}</strong></h6>
                    <h6><strong>Estimasi (Hari) : {{$key['etd'] }}</strong></h6>
                    <a><a>
                    <form method="post" action="{{ url('ongkir_terpilih') }}">
                    @csrf
                    <input type="hidden" name="nama_jasa" value="{{$key['name']}}">
                    <input type="hidden" name="deskripsi" value="{{$key['description'] }}">
                    <input type="hidden" name="biaya" value="{{$key['biaya'] }}">
                    <input type="hidden" name="estimasi" value="{{$key['etd'] }}">
                    <input type="submit" value="Pilih"  class="btn btn-ongkir">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 


    </div>
</div>
@include('layouts.footer')
@endsection


