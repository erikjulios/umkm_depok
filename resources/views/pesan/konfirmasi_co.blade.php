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
                        <div class="cart-table-co">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal Produk</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $no = 1; ?>
                                    @foreach($pesanan_details as $pesanan_detail)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img src="{{ url('img/iwapi_logo.jpg')}}" />
                                        </td>
                                        <td class="cart-title first-row ">
                                            {{ $pesanan_detail->produk->nama_barang }}
                                        </td>
                                        <td class="p-price first-row">Rp.{{ number_format($pesanan_detail->produk->harga) }}</td>
                                        <td class="p-jumlah first-row">{{ $pesanan_detail->jumlah_produk}}</td>
                                        <td class="p-total first-row">{{ number_format($pesanan_detail->total_pembayaran) }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                            {{-- <h5>Total Pesananan : Rp. {{ number_format($pesanan->jumlah_harga) }}</h5> --}}
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
    
                <div class="check-out">
                    
                        <button type="submit" class="btn btn-primary mt-4" value="submit"> 
                            <a href="{{url('payment')}}" class="btn-checkout">Bayar</a>
                        </button>
                            {{-- <a href="{{url('payment')}}">
                                Metode Pembayaran
                            </a> --}}
                    </div>
                </div>
            </div>
    
        </div>
    

    </div>
</div>

<!-- Breadcrumb Section end -->
@include('layouts.footer')
@endsection


