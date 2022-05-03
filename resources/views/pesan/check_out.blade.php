@extends('layouts.app')
@section('content')
     <meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2><i class="fa fa-shopping-cart"></i>Check Out</h2>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped">
                        <tr>
                            <td></td>
                            <td>Gambar</td>
                            <td>Nama barang</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Total harga</td>
                            <td>Aksi</td>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach($pesanan_details as $pesanan_detail)
                        <tr>
                            <form name="myform" method="POST" action="{{ url('pilih_pesanan') }}">
                                @csrf
                                <td><input type="checkbox" name="checkbox[]" id="checkbox" value="{{$pesanan_detail->id}}"></td>
                            </form>
                            <td><img src="{{url('img')}}/{{ $pesanan_detail->produk->foto_produk }}" width="150" height="150"></td>
                            <td>{{ $pesanan_detail->produk->nama_barang }}</td>
                            <td>{{ $pesanan_detail->jumlah_produk}}</td>
                            <td>Rp.{{ number_format($pesanan_detail->produk->harga) }}</td>
                            <td>Rp.{{ number_format($pesanan_detail->total_pembayaran) }}</td>
                            <td>
                                <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="background-color: lightgrey" colspan="5" align="right"><strong>Total Harga :</strong></td>
                            <td style="background-color: lightgrey "><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                            <td style="text-align: center;background-color: lightgrey"> 
                                <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i> Check Out
                                </a>
                            </td>
                        </tr>
                    </table>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>

 <script>  
     $(document).ready(function(){  
         $.ajaxSetup({
             headers: {
                // 'Content-Type':'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[type="checkbox"]').click(function(){  

            var data1 = { 'checkbox[]' : []};
             $("input:checked").each(function() {
             
             data1['checkbox[]'].push($(this).val()); 
             });

             console.log(data1);
             // alert(JSON.stringify(data1));

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
@endsection
