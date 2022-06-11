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
                <li class="breadcrumb-item active" aria-current="page">Section About</li>
            </ol>
        </nav>

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    Section About
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
                    @if (count($about) == 1)
                        {{-- <a href="{{ route('about.create')}}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus text-white-100"></i>
                            Tambah Data
                        </a> --}}
                    @else
                        <a href="{{ route('about.create')}}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus text-white-100"></i>
                            Tambah Data
                        </a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>link</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Update</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($about as $abouts)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $abouts->title}}</td>
                                    <td style="vertical-align: middle;">{!! $abouts->body !!}</td>
                                    <td style="vertical-align: middle;">{{$abouts->link}}</td>
                                    <td style="vertical-align: middle;">{{ $abouts->created_at }}</td>
                                    <td style="vertical-align: middle;">{{ $abouts->updated_at }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="{{ route('about.edit', $abouts->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('about.destroy', $abouts->id) }}" method="post"
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
                                    <td colspan="7" class="text-center">
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
