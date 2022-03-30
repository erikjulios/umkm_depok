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
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('check-out')}}">Check Out</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
                </ol>
            </nav>
        </div>
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
                   
                <a href="{{route('ongkir')}}" >
                    <h5><b>Tambahkan Jasa Kirim</b></h5>
                </a>
    
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                        <a href="">
                            <td><h5><b>Metode Pembayaran</b></h5></td> 
                        </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


