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
                <li class="breadcrumb-item active" aria-current="page">Section Produk</li>
            </ol>
        </nav>

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    Section Produk
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
                        {{-- <a href="{{ route('produk.create')}}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus text-white-100"></i>
                            Tambah Data
                        </a> --}}
                        <a href="{{ route('produk.create')}}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus text-white-100"></i>
                            Tambah Data
                        </a>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>UMKM</th>                                    
                                    <th>Berat Unit</th>
                                    <th>Harga Unit</th>
                                    <th>Komposisi</th>
                                    <th>Stock Tersedia</th>
                                    <th>Produk Terjual</th>
                                    <th>Deskripsi</th>
                                    <th>Varian</th>
                                    <th>Varian Tersedia</th>
                                    {{-- <th>Ketersedaan Produk</th> --}}
                                    <th>No BPOM</th>
                                    <th>Rating</th>
                                    <th>Diskon</th> 
                                    <th>Aksi    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($produk as $produk)
                                <tr>
                                    <td class="w-25">
                                        @if(empty($produk->foto_produk))
                                            <img src="http://via.placeholder.com/100x100" width="100%" >
                                        @else
                                            <img src="{{url($produk->foto_produk)}}" width="100%">
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">{{ $produk->nama_barang}}</td>
                                    <td style="vertical-align: middle;">{{ optional($produk->umkms)->nama_UMKM }}</td>
                                    
                                    <td style="vertical-align: middle;">{{ $produk->berat_unit }} gram</td>
                                    <td style="vertical-align: middle;">Rp.{{ number_format($produk->harga) }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->komposisi }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->stok}}</td>
                                    <td style="vertical-align: middle;">{{ $produk->produk_terjual }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->deskripsi }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->varian }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->varian_tersedia }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->no_BPOM }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->rating }}</td>
                                    <td style="vertical-align: middle;">{{ $produk->diskon }}</td>
                                    
                                    
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('produk.destroy', $produk->id) }}" method="post"
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
                                    <td colspan="20" class="text-center">
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
