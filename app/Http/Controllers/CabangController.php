<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UMKM;
use App\Produk;
use App\Cabang;

class CabangController extends Controller
{
    public function pilihcabang(Request $request){
    	$cabang = Cabang::all();
    	$cabang1 = $request->cabang;
    	if ($cabang1 == "0") {
    		$produk1 = Produk::all();
    		return view('pages.admin.produk.view', compact('produk1', 'cabang','cabang1'));
    	}
    	else{

    	$umkm = UMKM::where('cabang_id', $cabang1)->first();
    	$id_umkm = $umkm->id; 

    	$produk1 = Produk::where('umkm_id', $id_umkm)->get();
    	return view('pages.admin.produk.view', compact('produk1', 'cabang','cabang1'));
    }
    }
}
