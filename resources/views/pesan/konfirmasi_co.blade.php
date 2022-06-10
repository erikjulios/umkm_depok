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
                            <table id="pesanan">
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
                                       <!--  penjumlahan total dan ongkir -->
                                        <input type="hidden" id="harga" value="{{$pesanan_detail->total_pembayaran}}">
                                        
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
                                    <hr>
                                </a>
                                @if(empty($ongkir_terpilih))
                                <br> <p style="font-size: 15px; color: white; text-align: center;">Silahkan pilih jasa kirim</p>
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
                                    <input type="hidden" id="ongkir" value="{{$key['biaya']}}">

                                    <input type="hidden" name="nama_jasa" id="nama_jasa" value="{{$key['nama_jasa']}}">
                                    <input type="hidden" name="deskripsi" id="deskripsi" value="{{$key['deskripsi']}}">
                                    <input type="hidden" name="etd" id="etd" value="{{$key['estimasi']}}">   
                     
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
                        <button onclick="send_data()" class="btn btn-primary mt-4" value="submit"> 
                            bayar
                        </button>

                        <form id="total_biaya" action="{{url('payment_totalharga')}}" method="POST" style="border: solid; margin-right: 75px; margin-top: 25px">
                            @csrf
                            <div style="font-weight: bold; font-size: 20px">
                                Rp.<input type="number" id="total" name="total_pembayaran"  readonly style="border:none; text-align: center; width: 150px">
                                <input type="hidden" name="jasa" id="nama_jasa2">
                                <input type="hidden" name="desk" id="deskripsi2">
                                <input type="hidden" name="estimasi" id="etd2">
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    

    </div>
</div>
<script>

        
        var y = document.getElementById("ongkir");
        if (y == null) {
            var total = 0;
        }
        else{
            var table = document.getElementById("pesanan"), sumHsl = 0;
                for(var t = 1; t < table.rows.length; t++)
                {
                    var data = table.rows[t].cells[4].innerHTML;
                    var angka  = data.replace(",", "");
                    sumHsl = sumHsl + parseInt(angka);
                }

            var x = sumHsl;
            var y = document.getElementById("ongkir").value;
            var total = x + parseInt(y);
        }
        
        document.getElementById("total").value = total;   
        
         function send_data(){

            if (y == null) {
            alert('Silahkan pilih jasa kirim');
            }
            else{
                //data jasa kirim
                document.getElementById('nama_jasa2').value = document.getElementById('nama_jasa').value;           
                document.getElementById('deskripsi2').value = document.getElementById('deskripsi').value;           
                document.getElementById('etd2').value = document.getElementById('etd').value;   

                //total biaya  
                parseInt(document.getElementById("total").value);      
                //submit smua
                document.getElementById('total_biaya').submit();
            }   
        }
        
</script>


<!-- Breadcrumb Section end -->
@include('layouts.footer')
@endsection


