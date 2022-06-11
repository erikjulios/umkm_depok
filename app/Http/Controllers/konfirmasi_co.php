<?php
//tester
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Produk;
use App\DetailPemesanan;
use App\Pesanan;
use App\User;
use App\Alamat_kirim;
use Kavist\RajaOngkir\RajaOngkir;

class konfirmasi_co extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $apiKey = 'b8174b5dc662dbe51325e6689182628f';
    public $name_provkot=[],$provinsi,$provkot=[],$jasa, $berat, $result = [], $ongkir = [], $ongkir_terpilih=[],$pilih_alamat, $biayaongkir;
    public function mount($id){



    }
    public function index(){

    	//olah alamat
    	$user = User::where('id', Auth::user()->id)->first();
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
      $pesanan_details = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();


      $status = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->get();
      $status1 = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->first();
      $rajaOngkir = new RajaOngkir($this->apiKey);

      //tampilkan nama kota dan prov pada konfirmasi co blade
      foreach ($status as $key => $value ) {

          $this->provkot[] = array(
            'provinsi' => $value->provinsi,
            'kota' => $value->kota,
            'nama' => $value->nama,
            'nohp' => $value->nohp,
            'detail' => $value->detail,
           );
       } 
       foreach ($this->provkot as $key => $value) {
          $this->name_provkot[] = array(
            'kota' => $rajaOngkir->kota()->find($value['kota'])['city_name'],
            'provinsi' => $rajaOngkir->provinsi()->find($value['provinsi'])['province'],
            'nama' => $value['nama'],
            'nohp' => $value['nohp'],
            'detail' => $value['detail'],
           );
       }
      $nama_pk = $this->name_provkot;




     
      if (empty($this->ongkir_terpilih)) {
        return view('pesan.konfirmasi_co', compact( 'pesanan_details','user','status', 'nama_pk') );//,'hasil_kota','hasil_biaya'
       
      }
      else{
        $ongkir_terpilih = $this->ongkir_terpilih;
        return view('pesan.konfirmasi_co', compact( 'pesanan_details','user','status','ongkir_terpilih', 'nama_pk') );//,'hasil_kota','hasil_biaya'
      }
          if ($this->pilih_alamat = 1) {
        return view('pesan.konfirmasi_co', compact( 'pesanan_details','user','status', 'nama_pk'));
      }


    	

    }

    public function alamat(){
      $rajaOngkir = new RajaOngkir($this->apiKey);
// $daftarProvinsi = $rajaOngkir->kota()->find(80);
      $alamatk = Alamat_kirim::where('user_id', Auth::user()->id)->get(); 
      foreach ($alamatk as $key => $value ) {

          $this->provkot[] = array(
            'provinsi' => $value->provinsi,
            'kota' => $value->kota,
            'id' => $value->id,
            'status' => $value->status,
            'nama' => $value->nama,
            'nohp' => $value->nohp,
            'detail' => $value->detail,
           );
       } 
       foreach ($this->provkot as $key => $value) {
          // $this->kota =  $rajaOngkir->kota()->find($value['kota']);
          $this->name_provkot[] = array(
            'kota' => $rajaOngkir->kota()->find($value['kota'])['city_name'],
            'provinsi' => $rajaOngkir->provinsi()->find($value['provinsi'])['province'],
            'id' => $value['id'],
            'status' => $value['status'],
            'nama' => $value['nama'],
            'nohp' => $value['nohp'],
            'detail' => $value['detail'],
           );


          // $this->provinsi =  $rajaOngkir->provinsi()->find($value['provinsi']);
       }
      $nama_pk = $this->name_provkot;
      return view('pesan/alamat_kirim', compact('alamatk','nama_pk'));

    }

    public function tambah_alamat(Request $request){

      $user = User::where('id', Auth::user()->id)->first();
      $pesanan = Pesanan::where('user_id', Auth::user()->id)->first();
      $alamat_kirim = new Alamat_kirim;
      $alamat_kirim->user_id = $user->id;
      $alamat_kirim->nama = $request->name;
      $alamat_kirim->nohp = $request->nohp;
      $alamat_kirim->provinsi = $request->provinsi;
      $alamat_kirim->kota = $request->kota;
      $alamat_kirim->detail = $request->detail;
      $alamat_kirim->status = 0;

      $alamat_kirim->save();

      return redirect('alamat')->with('success', 'Alamat kirim ditambahkan!');


    }

    public function halaman_tambah_alamat(){
      // $x = $_POST['id_prov_terpilih'];

      $rajaOngkir = new RajaOngkir($this->apiKey);
      $daftarProvinsi = $rajaOngkir->provinsi()->all();
      $daftarKota = $rajaOngkir->kota()->all();
      // $daftarKota = $rajaOngkir->kota()->dariProvinsi($x)->all();
        
      return view('pesan.tambah_alamat',compact('daftarProvinsi','daftarKota'));
    }

    public function halaman_ongkir(){

    $rajaOngkir = new RajaOngkir($this->apiKey);
    $alamat = Alamat_kirim::where('user_id', Auth::user()->id)->where('status',1)->first();


    //pilih alamat kirim dulu baru ongkir
    if (!empty($alamat)) {

   
    $prov_asal = $alamat->provinsi ;
    $kota_tujuan = $alamat->kota;

    $pesanan = Pesanan::where('user_id', Auth::user()->id)->first();
    $pesanan_detail = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();

    foreach ($pesanan_detail as $key ) {
      $produk = Produk::where('id', $key->produk_id)->get();
      foreach ($produk as $value) {
        $this->berat = $this->berat + $value->berat_unit;
        
      }

    }

    $kurir = ['jne','tiki','pos'];

    for ($i=0; $i < 3; $i++) { 

    $this->ongkir = $rajaOngkir->ongkosKirim([
        'origin'        => 115,     // ID kota/kabupaten asal(depok)
        'destination'   => $kota_tujuan,      // ID kota/kabupaten tujuan
        'weight'        => $this->berat,    // berat barang dalam gram
        'courier'       => $kurir[$i]    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
    ])->get();


    foreach ($this->ongkir[0]['costs'] as $key) {
      $this->result[] = array(

          'description' => $key['description'],
          'biaya' => $key['cost'][0]['value'],
          'etd' => $key['cost'][0]['etd'],
          'name' => $this->ongkir[0]['name']
      );
     
    }

    }
    $hasil = $this->result;
  }
  else{
    $hasil = [];
  }

    return view('pesan/ongkir',compact('hasil'));

    }

    public function alamat_terpilih(){

      $alamat_terpilih = $_POST['alamat_terpilih'];

      $cek_status = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->first();
      if (empty($cek_status)) {
        $alamat_kirim = Alamat_kirim::where('user_id', Auth::user()->id)->where('id', $alamat_terpilih)->first();
        $alamat_kirim->status = 1;
        $alamat_kirim->update();
      }
      else{
        $tambah_status = Alamat_kirim::where('user_id', Auth::user()->id)->where('id', $alamat_terpilih)->first();
        
        $tambah_status->status = 1;
        $ubah_status = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->first();
        $ubah_status->status = 0;
        $ubah_status->update();
        $tambah_status->update();
      }

      $ubah_radio = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->first();
      return view('pesan/alamat_kirim', compact('ubah_radio'));

      
    }

    public function ongkir_terpilih(Request $request){
      $this->ongkir_terpilih[] = array(
          'nama_jasa' => $request->nama_jasa,
          'deskripsi' => $request->deskripsi,
          'biaya' => $request->biaya,
          'estimasi' => $request->estimasi
      );
      return $this->index();
      
    }

    // protected function payment(){
    //   // Set your Merchant Server Key
    // \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    // \Midtrans\Config::$isProduction = false;
    // // Set sanitization on (default)
    // \Midtrans\Config::$isSanitized = true;
    // // Set 3DS transaction for credit card to true
    // \Midtrans\Config::$is3ds = true;
    // }

    // private function generate_token(){
    //   $this->payment();
    //   $user = User::where('id', Auth::user()->id)->first();
    //   $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
    //   $pesanan_details = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();

    //   $cust_detail =[
    //       'nama' => $user->name,
    //       'email' => $user->email,
    //       'nohp' => $user->nohp
    //   ];

    //   $params = 
    // }

    public function payment(Request $request)
    {
      $data_ongkir = $request->jasa.",". $request->desk.",".$request->estimasi."(hari)";
      $cek_status = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->first();
      if (empty($cek_status)) {
        $this->pilih_alamat = 1;
        return $this->index();
      }

      // Set your Merchant Server Key
      \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
      // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
      \Midtrans\Config::$isProduction = false;
      // Set sanitization on (default)
      \Midtrans\Config::$isSanitized = true;
      // Set 3DS transaction for credit card to true
      \Midtrans\Config::$is3ds = true;

      $user = User::where('id', Auth::user()->id)->first();
      $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
      $pesanan_details = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();
      $total_pembayaran = (int) $request->total_pembayaran;
      $params = array(
          'transaction_details' => array(
              'order_id' => rand('100000','999999'),
              'gross_amount' => $total_pembayaran ,
          ),
          // 'item_details' => array(
          //   [
          //     'id' => "ma1",
          //     'price' => "200000",
          //     'quantity' => "3",
          //     'name' => "mangga"
          //   ]
          // ),

          'customer_details' => array(
              'first_name' => $user->name,
              'email' => $user->email,
              'phone' => $user->nohp,
          ),
      );
       
      $snapToken = \Midtrans\Snap::getSnapToken($params);
      return view('pesan/payment', compact('snapToken', 'data_ongkir'));
    }

}
