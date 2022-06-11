<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Produk;
=======
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418

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
<<<<<<< HEAD
        $produks = Produk::paginate(20);
        return view('home', compact('produks'));
=======
        return view('home');
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
    }
}
