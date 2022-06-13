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
                <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Section transaksi</a></li>
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
            <form action="{{ route('transaksi.store')}}" method="post" enctype="multipart/form-data">
                @csrf




                <div class="form-group">
                    <label>Nominal Transaksi<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="nominal_transaksi" placeholder="Masukkan Nominal Transaksi" required>
                </div>
                <div class="form-group">
                    <label>kode VA<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kode_VA" placeholder="Masukkan Kode VA"  required>
                </div>
                <div class="form-group">
                    <label>No Rekening<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="no_rekening" placeholder="Masukkan Nomor Rekening" required>
                </div>
                <div class="form-group">
                    <label>Waktu Pembayaran<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="waktu_pembayaran" placeholder="Masukkan Waktu Pembayaran" required>
                </div>
                <div class="form-group">
                    <label>Status Validasi<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="status_validasi" placeholder="Masukkan Status Validasi" required>
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
