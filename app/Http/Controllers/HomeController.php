<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produks = Produk::paginate(20);
        return view('home', compact('produks'));
    }

    // untuk menampilkan daftar produk dari sebuah kategori
    public function produks(Kategori $kategori)
    {
        return view('kategori_produk', [
            'produks' => $kategori->produks,
            'kategori' => $kategori->nama_kategori
            
        ]);
    }
}
