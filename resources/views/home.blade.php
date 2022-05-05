@extends('layouts.app')

@section('content')

        <div class="related-products spad">
            <div class="container">
                <div class="row">
        @foreach ($produks as $item)
        <div class="col-lg-3 col-sm-6">
        <div class="product-item">
            <div class="pi-pic">
                <img src="img/biji ketapang.jpg" class="card-img-top" style="wi" alt="{{ $item -> nama_barang}}">
                <ul>
                    <li class="w-icon active">
                        <a href="{{ url('pesan') }}/{{ $item -> id}}"><i class="icon_bag_alt"></i></a>
                    </li>
                    <li class="quick-view"><a href="#">Lihat Produk</a></li>
                </ul>
            </div>
            <div class="pi-text">
                <div class="catagory-name">Kategory Produk</div>
                <a href="#">
                    <h5>{{ $item -> nama_barang}}</h5>
                </a>
                <div class="product-price">
                    Rp.{{number_format($item -> harga)}}/pcs
                </div>
            </div>   
            </div>
        </div>

        {{-- <div class="col-md-4">
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
        </div> --}}
        @endforeach
    </div>
</div>

</div>
@include('layouts.footer')
@endsection

