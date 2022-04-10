@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('img/iwapi_logo.jpg')}}" width="200" height="200" class="rounded mx-auto d-block">
        </div>
        @foreach ($produks as $item)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" width="300" height="300" src="{{url('img')}}/{{$item->foto_produk}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $item -> nama_barang}}</h5>
                    <p class="card-text"><strong>Harga : Rp.{{number_format($item -> harga)}}</strong></p>
                    <p class="card-text"><strong>Stock : {{$item -> stok}} pcs</strong></p>
                    <p class="card-text"><strong>Berat : {{$item -> berat_unit}} kg</strong></p>
                    <p class="card-text"><strong>Komposisi : {{$item -> komposisi}}</strong></p>
                    <p class="card-text " style="color: red; text-align: right;"><strong>{{$item -> produk_terjual}} Produk terjual</strong></p>
                    <hr>
                    <strong>Deskripsi : <br> {{$item -> deskripsi}}</strong><br><br>
                    <a href="{{ url('pesan') }}/{{ $item -> id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    
@endsection

