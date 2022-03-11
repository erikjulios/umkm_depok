
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
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Section umkm</li>
            </ol>
        </nav>

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    Section umkm
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success w-100 mx-auto">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{session('success')}}</strong>
                        </div>
                    @elseif (session('delete'))
                        <div class="alert alert-danger w-100 mx-auto">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{session('delete')}}</strong>
                        </div>
                    @endif

                        <a href="{{ route('umkm.create')}}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus text-white-100"></i>
                            Tambah Data
                        </a>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>

                                    <th>NO</th>
                                    <th>Nama UMKM</th>
                                    <th>Nama Pemilik</th>
                                    <th>No Telpon</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Update</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($umkm as $umkms)
                                <tr>
                                    <td style="vertical-align: middle;"></td>
                                    <td style="vertical-align: middle;">{{ $umkms->nama_UMKM}}</td>
                                    <td style="vertical-align: middle;">{{ $umkms->nama_pemilik }}</td>
                                    <td style="vertical-align: middle;">{{$umkms->no_hp}}</td>
                                    <td style="vertical-align: middle;">{{$umkms->alamat_umkm}}</td>
                                    <td style="vertical-align: middle;">{{ $umkms->created_at }}</td>
                                    <td style="vertical-align: middle;">{{ $umkms->updated_at }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="{{ route('umkm.edit', $umkms->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('umkm.destroy', $umkms->id) }}" method="post"
                                              class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
