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
                        <span>Keranjang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Shopping Cart Section Begin -->

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="cart-table">
                                 @if(!empty($pesanan))
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Foto Produk</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php $no = 1; ?>
                                        @foreach($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td class="cart-pic first-row">
                                                @if(empty($pesanan_detail->produk->foto_produk))
                                                    <img src="http://via.placeholder.com/100x100" width="100%" >
                                                @else
                                                    <img src="{{url($pesanan_detail->produk->foto_produk)}}" width="100%" alt="{{ $pesanan_detail->produk->foto_produk }}">
                                                @endif
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
                                    @else
                                    <p style="font-weight: bold; font-size: 30px">Maaf, keranjang anda kosong</p>
                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="check-out">
                 @if(!empty($pesanan))
                <h5>Total Harga : <span>Rp. {{ number_format($pesanan->jumlah_harga) }}</span></h1>
                    <button type="submit" class="btn btn-primary mt-4" value="submit"> 
                        <a href="{{ url('konfirmasi-check-out') }}" class="btn-checkout">Check Out</a>
                    </button>
                @endif
                                     
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

