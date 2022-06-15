@extends('layouts.app')

@section('content')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                    <span>{{ $kategori }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <img src="{{url($item->foto_produk)}}" width="100%" alt="{{ $item ->nama_barang}}">
                @endif
                
                <ul>
                    <li class="w-icon active">
                        <a href="{{ url('pesan') }}/{{ $item->id}}"><i class="bi bi-cart-check"></i></a>
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

       
        @endforeach
    </div>
</div>

</div>
@include('layouts.footer')
@endsection

