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
                                <span>{{$produk -> nama_barang}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Breadcrumb Section Begin -->
    <div class="row">

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
                                                <i class="bi bi-cart-check"></i> Masukan keranjang</button>
                                        </form></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @endsection