<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
class tangkap_request_sandbox extends Controller
{
    public function payment_handler(Request $request){
    	$json = json_decode($request->getContent(), true);
    	
    	$signature_key = hash('sha512',$json['order_id'].$json['status_code'].$json['gross_amount'].env('MIDTRANS_SERVER_KEY'));

    	if ($signature_key != $json['signature_key']) {
    		return abort(404);
    	}
 		$transaksi = Transaksi::where('order_id', $json['order_id'])->first();
 		$transaksi->status = $json['transaction_status'];
    	return $transaksi->update();
    }
}
