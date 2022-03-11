
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
                <li class="breadcrumb-item"><a href="{{ route('umkm.index') }}">Section umkm</a></li>
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
            <form action="{{ route('umkm.update', $umkm->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label>Nama Umkm<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_UMKM" placeholder="Masukkan Nama Umkm" value="{{$umkm->nama_UMKM}}" required>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik<span class="text-danger">*</span></label>
                    <input id="text" class="form-control" name="nama_pemilik" placeholder="Masukkan Nama Umkm" value="{{$umkm->nama_pemilik}}" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="no_hp" placeholder="Masukkan Nomor Telepon" value="{{$umkm->no_hp}}" required>
                </div>
                <div class="form-group">
                    <label>Alamat Umkm<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="alamat_umkm" placeholder="Masukkan Alamat Umkm" value="{{$umkm->alamat_umkm}}" required>
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
