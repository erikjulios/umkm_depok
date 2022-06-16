<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailPemesanan;
use App\Pesanan;
use App\History_pemesanan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $pending = [], $dikemas ;


    protected function payment(){
    	// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;
    }

    public function payment_post(Request $request){
      $json = json_decode($request->json);
      //menambah data pesanan pada transaksi dan migrasi pesanan yang sudah di checkout ke history 
      $pesanan = Pesanan::where('user_id', Auth::user()->id)->first();
      $pesanan_detail = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();

      foreach ($pesanan_detail as $key) {
        $history = new History_pemesanan;
        $history->user_id = $pesanan->user_id;
        $history->produk_id = $key->produk_id;
        $history->jumlah_produk = $key->jumlah_produk;
        $history->jasa_kirim = $request->data_ongkir;
        //tanggal pesanan atau detail
        $history->tanggal_pembelian = $key->tanggal_pembelian;
        $history->total_pembayaran = $json->gross_amount;
        $history->pesanan_id = $pesanan->id;
        $history->save();
        
      }
      foreach ($pesanan_detail as $key) {
        $pesanan_detail2 = DetailPemesanan::where('pesanan_id', $pesanan->id)->first();
        $pesanan_detail2->delete();
      }
      
      $transaksi = new Transaksi;

      $transaksi->transaksi_id = $json->transaction_id;
      $transaksi->order_id = $json->order_id;
      $transaksi->jasa_kirim = $request->data_ongkir;
      $transaksi->nominal_transaksi = $json->gross_amount;
      $transaksi->waktu_pembayaran = $json->transaction_time;
      $transaksi->status = $json->transaction_status;
      $transaksi->payment_type = $json->payment_type;
      $transaksi->payment_code = isset($json->payment_code) ? $json->payment_code: null ;
      $transaksi->pdf_link = isset($json->pdf_url) ? $json->pdf_url: null ;
      $transaksi->user_id = $pesanan->user_id ;
      $transaksi->save();

      $pesanan->delete();

      return redirect('home')->with('success', 'Order ditambahkan!');
    }

    public function pending(){

      $transaksi = Transaksi::where('user_id', Auth::user()->id)->get();
        if ($transaksi == "[]") {
            return view('tracking.404');
        } 
        else{
              $pending = Transaksi::where('status','pending')->where('user_id', Auth::user()->id)->get();
            return view('tracking.pending', compact('pending'));
        }

    }
    public function dikemas(){
      $transaksi = Transaksi::where('user_id', Auth::user()->id)->get();
      if ($transaksi == "[]") {
          return view('tracking.404');
      } 
      else{
        $dikemas = Transaksi::where('status', 'settlement')->where('user_id',Auth::user()->id)->get();

        return view('tracking.dikemas', compact('dikemas'));
      }
      

    }

    public function dikirim(){
      $transaksi = Transaksi::where('user_id', Auth::user()->id)->get();
      if ($transaksi == "[]") {
          return view('tracking.404');
      } 
      else{
        $dikirim = Transaksi::where('status', 'dikirim')->where('user_id',Auth::user()->id)->get();

        return view('tracking.dikirim', compact('dikirim'));
      }
      

    }
}
