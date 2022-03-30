@extends('layouts.app')
@section('content')
 @include('sweetalert::alert')
     <meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('konfirmasi_co') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('check-out') }}">Checkout</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Alamat Kirim</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-user"></i> Pilih Alamat</h4> 
                </div> 
                <div class="card-body">
                    <table class="table table-striped">
                     
                        @foreach($alamatk as $x)
                        <tr>
                            <td><b>{{ $x->nama }}</b><br>
                            {{ $x->nohp }}<br>
                            {{ $x->detail }}<br>
                            {{ $x->kota }},{{ $x->provinsi }}</td>
                            <td style="padding-top: 50px;"><input type="radio" id="alamat_terpilih" name="alamat_terpilih" value="{{$x->id}}" <?php if($x->status == 1) echo 'checked'?> ></td>
                        </tr>
                        @endforeach
                    </table>
                    <a class="btn btn-primary" href="{{ url ('tambah_alamat') }}">Tambah Alamat</a>
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

@endsection
