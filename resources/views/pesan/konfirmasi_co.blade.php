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
    </div>
</div>

<!-- Breadcrumb Section end -->
  <div class="container">
    <div class="row">
      

        <div class="col-md-8">
            <!-- produk -->

            <div class="card konfir-co">
                <div class="card-body">
                    <h5>Produk</h5>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 daftar-produk">
                            @foreach($pesanan_details as $pesanan_detail)
                            <div class="row produks">
                                
                                <div class="col-lg ">
                                    <img src="{{ url('img/iwapi_logo.jpg')}}" alt="foto-produk" >
                                    
                                </div>
                                <div class="col-lg">
                                    <h4>{{ $pesanan_detail->produk->nama_barang }}</h4>
                                    <p>Jumlah : {{ $pesanan_detail->jumlah_produk}} produk</p>
                                    <p>Harga Satuan : Rp.{{ number_format($pesanan_detail->produk->harga) }}</p>
                                    <p>Total harga : Rp.{{ number_format($pesanan_detail->total_pembayaran) }}</p>

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
                        <tr>
                            <td><b>{{ $status->nama }}</b><br>
                            {{ $status->nohp }}<br>
                            {{ $status->detail }}<br>
                            {{ $status->kota }},{{ $status->provinsi }}</td>

                        </tr>                      
                </div>
            </div>

            
            <div class="card konfir-co">
                <div class="card-body">

                <!-- ongkir -->

                <a href="{{url('ongkir')}}" >
                    Tambahkan Jasa Kirim
                </a>
                @if(empty($ongkir_terpilih))
                @else
                    @foreach ($ongkir_terpilih as $key )
                    <tr>
                        <td><b>{{ $key['nama_jasa'] }}</b><br>
                            {{ $key['deskripsi'] }}<br>
                            Rp.{{ $key['biaya'] }}<br>
                            Estimasi pengiriman {{ $key['estimasi'] }}(hari)
                        </td>

                    </tr>
                    @endforeach  
                @endif 
    
                </div>
            </div>

            <!-- pembayaran  -->

            <div class="card konfir-co">
                <div class="card-body">
                        <a href="">
                            Metode Pembayaran
                        </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


