<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Produk;
use App\DetailPemesanan;
use App\Pesanan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('pesan.index', compact('produk'));
    }


    public function pesan(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi pesanan melebihi stok
        if ($request->jumlah_pesan > $produk->stok) {
            Alert::error('Pesanan melebihi stok', 'Silahkan perhatikan stok produk');
            return redirect('pesan/' . $id);
        }

        //cek validasi pesanan sudah ada
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (empty($cek_pesanan)) {
            //simpan ke db
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga  = 0;
            $pesanan->save();
            Alert::success('Produk ditambahkan ke keranjang', 'Success');
        }



        //simpan ke pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //penambahn total jumlah pesanan yang sama
        $cek_pesanan_detail = DetailPemesanan::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {

            $pesanan_detail = new DetailPemesanan();
            $pesanan_detail->produk_id = $produk->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah_produk = $request->jumlah_pesan;
            $pesanan_detail->total_pembayaran = $produk->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
            Alert::success('Produk ditambahkan ke keranjang', 'Success');
        } else {
            $pesanan_detail = DetailPemesanan::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah_produk = $pesanan_detail->jumlah_produk + $request->jumlah_pesan;
            $harga_pesanan_detail_baru = $produk->harga * $request->jumlah_pesan;

            $pesanan_detail->total_pembayaran =  $pesanan_detail->total_pembayaran + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $produk->harga * $request->jumlah_pesan;
        $pesanan->update();



        return redirect('home')->with('success', 'Produk ditambahkan ke keranjang!');
    }


    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if (!empty($pesanan)) {
            $pesanan_details = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function pilih_co(Request $request){
        dd($request->all());
        // $id_pesan = $_POST['id_pesanan'];
        return view('aa');

        // echo ($id_pesan);
    }


    public function delete($id)
    {
        $pesanan_detail = DetailPemesanan::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->total_pembayaran;
        $pesanan->update();

        $pesanan_detail->delete();

        return redirect('check-out')->with('success', 'Pesanan Sukses Dihapus!');
    }


    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->alamat)) {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        if (empty($user->nohp)) {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }
        //PROSES PEMILIHAN PESANAN YANG MAU DICKOUT LALU BAWA KE HALAMAN KONFIRMASI CO

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        // $pesanan->status = 1;
        // $pesanan->update();

        $pesanan_details = DetailPemesanan::where('pesanan_id', $pesanan_id)->get();
        // foreach ($pesanan_details as $pesanan_detail) {
        //     $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
        //     $produk->stok = $produk->stok - $pesanan_detail->jumlah_produk;
        //     $produk->update();
        // }



        // Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        // return redirect('konfirmasi_co', compact('pesanan_details'));
        return redirect('konfirmasi_co');
        // return redirect('check-out');
    }
}
