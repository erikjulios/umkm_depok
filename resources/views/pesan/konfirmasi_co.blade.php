@extends('layouts.app')
@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('check-out')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('check-out')}}">Keranjang</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>

        <!-- Alamat kirim  -->

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <a href="{{url('alamat')}}" >
                          <h5><b>Tambahkan Alamat Pengiriman</b></h5>
                        </a>
                        <tr>
                            <td><b>{{ $status->nama }}</b><br>
                            {{ $status->nohp }}<br>
                            {{ $status->detail }}<br>
                            {{ $status->kota }},{{ $status->provinsi }}</td>

                        </tr>                      
                </div>
            </div>

            <!-- produk -->

            <div class="card">
                <div class="card-body">
                    <h5><b>Produk</b></h5>
                    <table class="table table-striped">                    
                        @foreach($pesanan_details as $pesanan_detail)
                        <tr>
                        <td><img src="{{url('img')}}/{{ $pesanan_detail->produk->foto_produk }}" width="150" height="150"></td>
                        <td style="padding-right: 500px">
                            <h4><b>{{ $pesanan_detail->produk->nama_barang }}</b></h4>
                            Jumlah :{{ $pesanan_detail->jumlah_produk}} produk<br>
                            Harga Satuan : Rp.{{ number_format($pesanan_detail->produk->harga) }}<br>
                            Total harga : Rp.{{ number_format($pesanan_detail->total_pembayaran) }}
                        </td>
                        </tr>
                        @endforeach
                    </table>    
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                <!-- ongkir -->

                <a href="{{url('ongkir')}}" >
                    <h5><b>Tambahkan Jasa Kirim</b></h5>
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

            <div class="card">
                <div class="card-body">
                        <a href="{{url('payment')}}">
                            <td><h5><b>Metode Pembayaran</b></h5></td> 
                        </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


