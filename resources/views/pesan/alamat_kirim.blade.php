@extends('layouts.app')
@section('content')
 @include('sweetalert::alert')
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{ url('check-out')}}"> Keranjang</a>
                        <a href="{{ url('konfirmasi_co') }}"> Check Out</a>
                        <span>Alamat Kirim</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
       
        <div class="col-md-12">
            <div class="card tambah-alamat">
                <div class="card-header">
                    <h4><i class="bi bi-geo-fill"></i> Pilih Alamat</h4> 
                </div> 
                <div class="card-body">
                    <table class="table">
                     @if(empty($alamatk))
                     @else
                        @foreach($nama_pk as $x)
                        <tr>
                            <td><b>{{ $x['nama'] }}</b><br>
                            {{ $x['nohp'] }}<br>
                            {{ $x['detail'] }}<br>
                   
                            {{ $x['kota']}},{{ $x['provinsi'] }}</td>
                            <td style="padding-top: 50px;"><input type="radio" id="alamat_terpilih" name="alamat_terpilih" value="{{$x['id']}}" <?php if($x['status'] == 1) echo 'checked'?> ></td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    <a class="btn " href="{{ url ('tambah_alamat') }}">Tambah Alamat</a>
                    <a class="btn " style="margin-right: 20px" href="{{ url ('konfirmasi_co') }}">Kembali</a>
                </div>
            </div>
        </div>
               
    </div>
</div>
       <!--  <script>
            $(document).ready(function(){
                // $.ajaxSetup({
                //   headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //   }
                // });
                    $.ajax({
                    type :'post',
                    url  :  '/konfirmasi_co/',
                    success:function(hasil_provinsi)
                    {
                        $('select[name=nama_provinsi]').html(hasil_provinsi);
                    }
                });

                $("select[name=nama_provinsi]").on("change",function(){
                    //ambil id prov
                    var id_prov_terpilih = $("option:selected",this).attr("id_provinsi");
                    $.ajax({
                        type : 'post'
                        url  :  '/konfirmasi_co/',
                    });
                    alert(id_prov_terpilih);
                });
            });
        </script> -->
        <script>  
         $(document).ready(function(){  
             $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('input[type="radio"]').click(function(){  
                var alamat = $(this).val(); 
                $.ajax({  
                        url:"{{route('alamat_terpilih')}}",  
                        method:"POST",  
                        data:{alamat_terpilih:alamat}
                });
            });  
         });  
        </script>  
@include('layouts.footer')
@endsection
