@extends('layouts.app')
@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="select2/dist/js/select2.min.js"></script>
   
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{ url('check-out')}}"> Keranjang</a>
                        <a href="{{ url('konfirmasi_co') }}"> Check Out</a>
                        <a href="{{ url('alamat') }}"> Alamat Anda</a>
                        <span>Tambah Alamat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
           
                    <h4><i class="fa fa-pencil-alt"></i> Tambah Alamat</h4>
                    <form method="POST" action="{{ url('alamat') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nohp" class="col-md-2 col-form-label text-md-right">No. HP</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" required autocomplete="nohp" autofocus>

                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                              

                        <div class="form-group row">
                            <label for="provinsi" class="col-md-2 col-form-label text-md-right">Provinsi</label>

                            <div class="col-md-6">
                                <select name="provinsi" id="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" required  >
                                    @foreach($daftarProvinsi as $prov)
                                    <option value="{{$prov['province_id']}}" >{{$prov['province']}}</option>
                                    @endforeach
                                </select>

                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kota" class="col-md-2 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <select id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota">
                                    @foreach($daftarKota as $kota)
                                    <option value="{{$kota['city_id']}}">{{$kota['city_name']}}</option>
                                    @endforeach
                                </select>

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail" class="col-md-2 col-form-label text-md-right">{{ __('Detail') }}</label>

                            <div class="col-md-6">
                                <textarea name="detail" id="detail" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-simpan">
                                    Simpan
                                </button>
<!--                                 <div id="aa"></div>
 -->                            </div>
                        </div>
                    </form>       
        </div>
    </div>
    </div>         

<!-- <script>
    function cari(id){
        const xmlhttp = new XMLHttpRequest();

        xmlhttp.onload = function() {
          document.getElementById("aa").innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "{{redirect('konfirmasi_co')}}");
        xmlhttp.send();
            }

</script> -->

    <script>
        $(document).ready(function(){
              $('#provinsi').select2({
                placeholder :'pilih provinsi',
                theme : "bootstrap"
            });
            $('#kota').select2({
                placeholder :'pilih kota ',
                theme : "bootstrap"
            });
 
        });
    </script>

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




        
    <!--     <script>  
        $(document).ready(function(){  
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
            });

            $("select[name=provinsi]").on("change",function(){
                    //ambil id prov sukses
                    var id_prov_terpilih = $("#provinsi").find("option:selected").attr("value");
                    //error
                    $.ajax({  
                        url:"",  
                        method:"POST",  
                        data: {id_prov_terpilih}
                });
                  
            }); 
         });  
        </script>   -->
        @include('layouts.footer')
@endsection