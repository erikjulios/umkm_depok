@extends('layouts.app')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Profil</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                     
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Ubah Data Akun :
                            </h4>
                            <div class="user-checkout">
                                <form method="POST" action="{{ url('profile') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Nama Lengkap') }} <span>*</span></label>
                                        <input input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="Masukan Nama">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Alamat E-mail') }} <span>*</span> </label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Masukan Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No. HP <span>*</span> </label>
                                        <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->nohp }}" required autocomplete="nohp" autofocus placeholder="Masukan No. HP">
                                       
                                        @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Lengkap <span>*</span> </label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required="" rows="3">{{ $user->alamat }}</textarea>
                                    
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <h4 class="mb-4">
                                        Ubah Password:
                                    </h4>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-simpan">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <h4>Informasi Akun : </h4>
                                <ul>
                                    <li class="subtotal">Nama<span>{{ $user->name }}</span></li>
                                    <li class="subtotal mt-3">Email <span>{{ $user->email }}</span></li>
                                    <li class="subtotal mt-3">No HP <span>{{ $user->nohp }}</span></li>
                                    <li class="subtotal mt-3">Alamat <span>{{ $user->alamat }}</span></li>
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    @include('layouts.footer')
@endsection