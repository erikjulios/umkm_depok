<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Produk;
use App\DetailPemesanan;
use App\Pesanan;
use App\User;
use App\Alamat_kirim;
use Kavist\RajaOngkir\RajaOngkir;
use Livewire\Component;

class Ongkir extends Component
{
    public function render()
    {
        return view('livewire.ongkir')
        ->extends('layout.app')->section('content');
    }

    
    private $apiKey = 'b8174b5dc662dbe51325e6689182628f';
    public $provinsi,$kota,$jasa, $berat, $ongkir = [];


    public function getOngkir(){

    $rajaOngkir = new RajaOngkir($this->apiKey);
    $alamat = Alamat_kirim::where('user_id', Auth::user()->id)->where('status',1)->first();

    $prov_asal = $alamat->provinsi ;
    $kota_asal = $alamat->kota;

    $pesanan = Pesanan::where('user_id', Auth::user()->id)->first();
    $pesanan_detail = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();

    foreach ($pesanan_detail as $key ) {
      $produk = Produk::where('id', $key->produk_id)->get();
      foreach ($produk as $value) {
        $this->berat = $this->berat + $value->berat_unit;
      }

    }


    $this->ongkir = $rajaOngkir->ongkosKirim([
        'origin'        => 115,     // ID kota/kabupaten asal(depok)
        'destination'   => $kota_asal,      // ID kota/kabupaten tujuan
        'weight'        => $this->berat,    // berat barang dalam gram
        'courier'       => 'tiki'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
    ]);
   echo('test');
    // dd($this->ongkir);
    // $result = json_decode($ongkir, true);
    // foreach ($ongkir[0]['costs'] as $key) {
    //   $this->result[] = array(
    //       'description' => $key['description'],
    //       'biaya' => $key['cost'][0]['value'],
    //       'etd' => $key['cost'][0]['etd']
    //   );
    // }
    // dd($this->result);
    // $hasil = $ongkir['rajaongkir']['results'];


    // dd($ongkir[0]['costs'][2]['cost'][0]['value']);
      // return view('livewire/ongkir');
    // return('a');
    }
}


// masi mentok di function getongkir belum integrasi dengan render halaman