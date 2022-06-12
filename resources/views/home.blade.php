@extends('layouts.app')

@section('content')

        <div class="related-products spad">
            <div class="container">
                <div class="row">
        @foreach ($produks as $item)
        <div class="col-lg-3 col-sm-6">
        <div class="product-item">
            <div class="pi-pic">
                @if(empty($item->foto_produk))
                    <img src="http://via.placeholder.com/100x100" width="100%" >
                @else
                    <img src="{{url($item->foto_produk)}}" width="100%" alt="{{ $item -> nama_barang}}">
                @endif
                
                <ul>
                    <li class="w-icon active">
                        <a href="{{ url('pesan') }}/{{ $item -> id}}"><i class="bi bi-cart-check"></i></a>
                    </li>
                    <li class="quick-view"><a href="{{ url('pesan') }}/{{ $item -> id}}">Lihat Produk</a></li>
                </ul>
            </div>
            <div class="pi-text">
                <div class="catagory-name">{{ optional($item->kategoris)->nama_kategori }}</div>
                <a href="{{ url('pesan') }}/{{ $item -> id}}">
                    <h5>{{ $item -> nama_barang}}</h5>
                </a>
                <div class="product-price">
                    Rp.{{number_format($item -> harga)}}/pcs
                </div>
                <div class="product-terjual">
                    {{$item -> produk_terjual}} terjual
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

