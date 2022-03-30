@extends('layouts.app')
@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('check-out')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('check-out')}}">Check Out</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($ongkir[0]['costs'] as $key)
                        biaya : {{$key['biaya'] }}<br>
                        etd : {{$key['etd'] }}<br>
                        description : {{$key['description'] }}
                    @endforeach                       
                </div>
            </div>
           
        
        </div>

    </div>
</div>

@endsection


