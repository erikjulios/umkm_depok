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
                    <a href="{{ url('check-out')}}"> Keranjang</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>

        <div class="row">      
            <div class="col-lg-12">
                <!-- produk -->
    
                <div class="card konfir-co">
                    <div class="card-body">
                        <h5>Produk</h5>
                        <div class="row justify-content-center">
                            <div class="col-lg-10 daftar-produk">
                                @foreach($pesanan_details as $pesanan_detail)
                                <div class="row produks">
                                    
                                    <div class="col ">
                                        <img src="{{ url('img/iwapi_logo.jpg')}}" alt="foto-produk" >
                                        
                                    </div>
                                    <div class="col ket-produk">
                                        <p><span>{{ $pesanan_detail->produk->nama_barang }}</span></p>
                                        <p>Jumlah : {{ $pesanan_detail->jumlah_produk}} produk</p>
                                        <p>Harga Satuan : Rp.{{ number_format($pesanan_detail->produk->harga) }}</p>
                                        <p>Total harga : <span>Rp.{{ number_format($pesanan_detail->total_pembayaran) }}</span> </p>
    
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>    
                    </div>
                </div>
    
    
                  <!-- Alamat kirim  -->
                <div class="card konfir-co">
                    <div class="card-body">
                            <a href="{{url('alamat')}}" >
                              Tambahkan Alamat Pengiriman
                            </a>
                            <div class="row justify-content-center">
                            <div class="col-lg-10 daftar-produk">
                            <div class="row produks">
                                                                    
                                <div class="col">
                                    <ul>
                                @if(empty($status))
                                @else
                                @foreach($nama_pk as $x)
                                <li>{{ $x['nama'] }}</li>
                                <li>{{ $x['nohp'] }}</li>
                                <li>{{ $x['detail'] }}</li>
                                <li>{{ $x['kota'] }},{{ $x['provinsi'] }}</li>
                                @endforeach
                                @endif
                            </ul>

                                </div>
                                
                            </div>
                            
                            </div>              
                    </div>
                </div>
                </div>

                    <!-- ongkir -->
                    <div class="card konfir-co">
                        <div class="card-body">
                                <a href="{{url('ongkir')}}" >
                                    Tambahkan Jasa Kirim
                                </a>
                                @if(empty($ongkir_terpilih))
                                @else
                                @foreach ($ongkir_terpilih as $key )
                                <div class="row justify-content-center">
                                <div class="col-lg-10 daftar-produk">
                                <div class="row produks">
                                                                        
                                    <div class="col">
                                        <ul>
                                    <li>{{ $key['nama_jasa'] }}</li>
                                    <li>{{ $key['deskripsi'] }}</li>
                                    <li>Rp.{{ $key['biaya'] }}</li>
                                    <li>Estimasi pengiriman {{ $key['estimasi'] }}(hari)</li>
                                </ul>
    
                                    </div>
                                    
                                </div>
                                
                                </div>              
                        </div>
                        @endforeach  
                        @endif 
                    </div>
                    </div>
                <!-- pembayaran  -->
    
                <div class="card konfir-co">
                    <div class="card-body">
                            <a href="{{url('payment')}}">
                                Metode Pembayaran
                            </a>
                    </div>
                </div>
            </div>
    
        </div>
    

    </div>
</div>

<!-- Breadcrumb Section end -->
@include('layouts.footer')
@endsection


