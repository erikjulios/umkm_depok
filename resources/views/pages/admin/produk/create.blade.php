@extends('layouts.admin')
@prepend('add-style')
    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endprepend
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Section produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success w-100 mx-auto">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{session('success')}}</strong>
        </div>
    @endif
    <div class="card shadow">
        <div class="card-header">
            Tambah Data
        </div>
        <div class="card-body">
            <form action="{{ route('produk.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_barang">Nama Produk<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukan nama produk" name="nama_barang">
                    @error('nama_barang')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="namaumkm">Nama UMKM<span class="text-danger">*</span></label>
                    <select class="form-select" name="umkm_id">
                        
                        @foreach($umkms as $umkm)
                        <option value="{{$umkm->id}}">{{ $umkm->nama_UMKM }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="kategori">Kategori<span class="text-danger">*</span></label>
                    <select class="form-select" name="kategori_id">
                        
                        @foreach($kategoris as $kategori)
                        <option value="{{$kategori->id}}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="foto_produk" class="form-label @error('foto_produk') is-invalid @enderror">Foto Produk<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="foto_produk" name="foto_produk">
                    @error('foto_produk')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="berat_unit">Berat Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('berat_unit') is-invalid @enderror" id="berat_unit" placeholder="Masukan berat unit (dalam angka)" name="berat_unit">
                    @error('berat_unit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="harga">Harga Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukan harga unit (dalam angka)" name="harga">
                    @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="komposisi">Komposisi<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('komposisi') is-invalid @enderror" id="komposisi" placeholder="Masukan komposisi" name="komposisi">
                    @error('komposisi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="stok">Stok Tersedia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukan stok tersedia" name="stok">
                    @error('stok')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">Deskripsi :</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukan deskripsi" name="deskripsi">
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="form-group">
                    <label>varian<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="varian" placeholder="Masukkan Varian" value="{{old('varian')}}" required>
                </div>              

                <div class="form-group">
                    <label for="no_BPOM">No BPOM</label>
                    <input type="text" class="form-control @error('no_BPOM') is-invalid @enderror" id="no_BPOM" placeholder="Masukan No BPOM" name="no_BPOM">
                    @error('no_BPOM')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary btn-block">
                    Tambah Produk
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('add-script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Ketikkan disini!',
                height: 150,
            });
        });
    </script>
@endsection
