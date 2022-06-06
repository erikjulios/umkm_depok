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
                        <span>Check out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Shopping Cart Section Begin -->

    <section class="shopping-cart spad">
        <div class="container">
            <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Foto Produk</th>
                                            <th >Product Name</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($pesanan))
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
                                            <td class="delete-item"><a href="#"><i class="material-icons">
                                                <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-sm btn-hapus" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                                </form>
                                              </i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="check-out">
                <h5>Total Harga : <span>Rp. {{ number_format($pesanan->jumlah_harga) }}</span></h1>
                    <a href="{{ url('konfirmasi-check-out') }}" class="btn-checkout">Check Out</a>
                                     
               </div>
                
        </div>
    </section>

 <script>  
     $(document).ready(function(){  
         $.ajaxSetup({
             headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[type="checkbox"]').click(function(){  

            var data1 = { 'checkbox[]' : []};
             $("input:checked").each(function() {
             
             data1['checkbox[]'].push($(this).val()); 
             });

             console.log(data1);
            $.ajax({  
                    url:"{{route('pilih_co')}}",  
                    method:"POST",  
                    data:{id : data1},
                    success: function(data) {
                        alert(data);
                    },
                    error: function(data){
                        alert("fail");
                    },
            });
        });  
     });  
</script>  
@include('layouts.footer')
@endsection

