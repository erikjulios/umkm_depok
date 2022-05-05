@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Beranda</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->



    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$produk -> nama_barang}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{url('img')}}/{{$produk->foto_produk}}" class="rounded mx-auto d-block" width="400" height="400">
                        </div>
                        <div class="col-md-6 mt-4   ">
                            <h2>{{$produk -> nama_barang}}</h2>
                            <table >
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp.{{number_format($produk -> harga)}}</td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td>{{$produk -> stok}}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>{{$produk -> deskripsi}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pesan</td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><form method="post" action="{{url('pesan')}}/{{$produk -> id}}">
                                            {{ csrf_field() }}
                                            <input type="text" name="jumlah_pesan" class="form-control" placeholder="Masukan jumlah pesanan">
                                            <button type="submit" class="btn btn-primary mt-4" value="submit">
                                                <i class="fa fa-shopping-cart"></i> Masukan keranjang</button>
                                        </form></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
