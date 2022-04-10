@extends('layouts.app')
@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('konfirmasi_co')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('check-out')}}">Keranjang</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('konfirmasi_co')}}">Checkout</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Jasa Kirim</li>
                </ol>
            </nav>
        </div>

 @foreach ($hasil as $key)
<div class="col-md-4">
    <div class="card mt-4">
        <div class="card-header bg-dark" style="color:white">{{$key['name']}}</div>
        <div class="card-body text-center ">
            <h6 class="card-subtitle mb-2 text-muted">{{$key['description'] }}</h6><hr>
            <div class="row mt-2">
                <div class="col-md-12">
                    <h6><strong>Biaya : {{$key['biaya'] }}</strong></h6>
                    <h6><strong>Estimasi (Hari) : {{$key['etd'] }}</strong></h6>
                    <a><a>
                    <form method="post" action="{{ url('ongkir_terpilih') }}">
                    @csrf
                    <input type="hidden" name="nama_jasa" value="{{$key['name']}}">
                    <input type="hidden" name="deskripsi" value="{{$key['description'] }}">
                    <input type="hidden" name="biaya" value="{{$key['biaya'] }}">
                    <input type="hidden" name="estimasi" value="{{$key['etd'] }}">
                    <input type="submit" value="Pilih"  class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 


    </div>
</div>

@endsection


