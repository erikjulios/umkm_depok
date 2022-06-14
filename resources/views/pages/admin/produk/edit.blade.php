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
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
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
            Edit Data
        </div>
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                
                <div class="form-group">

                    <label>Nama Produk<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Produk" value="{{$produk->nama_barang}}" required>
                </div>
                <div style="width: 150px; padding: 20px 0;">
                    <img src="{{ url($produk->foto_produk) }}" width="100%">
                </div>
                <div class="form-group">
                    <label>Foto Produk</label>
                    <input type="file" class="custom-file" name="foto_produk" placeholder="Masukkan Foto Produk">
                </div>
                <div class="form-group">
                    <label>Berat Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="berat_unit" placeholder="Masukkan Berat Unit" value="{{$produk->berat_unit}}" required>
                </div>
                <div class="form-group">
                    <label>Harga Unit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Unit" value="{{$produk->harga}}" required>
                </div>
                <div class="form-group">
                    <label>Komposisi Produk<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="komposisi" placeholder="Masukkan Komposisi" value="{{$produk->komposisi}}" required>
                </div>
                <div class="form-group">
                    <label>Stock Tersedia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="stok" placeholder="Masukkan Stock Tersedia" value="{{$produk->stok}}" required>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="deskripsi" value="{{$produk->deskripsi}}" required>{!!$produk->deskripsi!!}</textarea>
                </div>
                <div class="form-group">
                    <label>varian<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="varian" placeholder="Masukkan Varian" value="{{$produk->varian}}" required>
                </div>
                <div class="form-group">
                    <label>varian_tersedia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="varian_tersedia" placeholder="Masukkan Varian Tersedia" value="{{$produk->varian_tersedia}}" required>
                </div>
                
                <div class="form-group">
                    <label>No BPOM</label>
                    <input type="text" class="form-control" name="no_BPOM" placeholder="Masukkan No BPOM" value="{{$produk->no_BPOM}}" >
                </div>
                
                <div class="form-group">
                    <label>Diskon</label>
                    <input type="text" class="form-control" name="diskon" placeholder="Masukkan Diskon" value="{{$produk->diskon}}" >
                </div>

                <button class="btn btn-primary btn-block">
                    Simpan
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
