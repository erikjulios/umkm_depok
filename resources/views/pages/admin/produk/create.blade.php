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
                {{-- <div class="form-group">
                    <label>Nama Produk<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Produk" value="{{old('nama_produk')}}" required>
                </div> --}}
                <div class="form-group">
                    <label for="namaumkm">Nama UMKM :</label>
                    <select class="form-select" name="umkm_id">
                        <option selected>Pilih UMKM</option>
                        @foreach($umkms as $umkm)
                        <option value="{{$umkm->id}}">{{ $umkm -> nama_UMKM }}</option>
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
                {{-- <div class="form-group">
                    <label>Foto Produk<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="foto_produk" placeholder="Masukkan Foto Produk" value="{{old('foto_produk')}}" required>
                </div> --}}
                <div class="form-group">
                    <label for="berat_unit">Berat Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('berat_unit') is-invalid @enderror" id="berat_unit" placeholder="Masukan berat unit" name="berat_unit">
                    @error('berat_unit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Berat Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="berat_unit" placeholder="Masukkan Berat Unit" value="{{old('berat_unit')}}" required>
                </div> --}}
                <div class="form-group">
                    <label for="harga">Harga Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukan harga unit" name="harga">
                    @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Harga Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Unit" value="{{old('harga_unit')}}" required>
                </div> --}}
                <div class="form-group">
                    <label for="komposisi">Komposisi<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('komposisi') is-invalid @enderror" id="komposisi" placeholder="Masukan komposisi" name="komposisi">
                    @error('komposisi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Komposisi Produk<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="komposisi" placeholder="Masukkan Komposisi" value="{{old('komposisi')}}" required>
                </div> --}}
                <div class="form-group">
                    <label for="stok">Stok Tersedia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukan stok tersedia" name="stok">
                    @error('stok')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Stock Tersedia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="stok" placeholder="Masukkan Stock Tersedia" value="{{old('stok_tersedia')}}" required>
                </div> --}}

                {{-- <div class="form-group">
                    <label>Produk Terjual<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="produk_terjual" placeholder="Masukkan Produk Terjual" value="{{old('produk_terjual')}}" required>
                </div> --}}

                <div class="form-group">
                    <label for="deskripsi">Deskripsi :</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukan deskripsi" name="deskripsi">
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 

                {{-- <div class="form-group">
                    <label>Deskripsi<span class="text-danger">*</span></label>
                    <textarea id="summernote" class="form-control" name="deskripsi" value="{{old('deskripsi')}}" required></textarea>
                </div> --}}
                <div class="form-group">
                    <label>varian<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="varian" placeholder="Masukkan Varian" value="{{old('varian')}}" required>
                </div>
                {{-- <div class="form-group">
                    <label>varian_tersedia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="varian_tersedia" placeholder="Masukkan Varian Tersedia" value="{{old('varian_tersedia')}}" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label>Ketersediaan Produk<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="ketersediaan_produk" placeholder="Masukkan Ketersediaan Produk" value="{{old('ketersediaan_produk')}}" required>
                </div> --}}

                <div class="form-group">
                    <label for="no_BPOM">No BPOM<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('no_BPOM') is-invalid @enderror" id="no_BPOM" placeholder="Masukan No BPOM" name="no_BPOM">
                    @error('no_BPOM')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

{{--                 
                <div class="form-group">
                    <label>Rating<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="rating" placeholder="Masukkan Rating" value="{{old('rating')}}" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Masukan diskon" name="diskon">
                    @error('diskon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Diskon</label>
                    <input type="text" class="form-control" name="diskon" placeholder="Masukkan Diskon" value="{{old('diskon')}}" required>
                </div> --}}

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
