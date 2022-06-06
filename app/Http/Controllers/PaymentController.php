<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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
      $transaksi = new Transaksi;

      $transaksi->transaksi_id = $json->transaction_id;
      $transaksi->order_id = $json->order_id;
      $transaksi->nominal_transaksi = $json->gross_amount;
      $transaksi->waktu_pembayaran = $json->transaction_time;
      $transaksi->status = $json->transaction_status;
      $transaksi->payment_type = $json->payment_type;
      $transaksi->payment_code = isset($json->payment_code) ? $json->payment_code: null ;
      $transaksi->pdf_link = isset($json->pdf_url) ? $json->pdf_url: null ;
      $transaksi->save();

      return redirect('home')->with('success', 'Order ditambahkan!');
    }
}
