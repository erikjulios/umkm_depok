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
    public $provinsi,$kota,$jasa, $berat, $result = [], $ongkir = [], $ongkir_terpilih=[];
    public function mount($id){



    }
    public function index(){

    	//olah alamat
    	$user = User::where('id', Auth::user()->id)->first();
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
      $pesanan_details = DetailPemesanan::where('pesanan_id', $pesanan->id)->get();

      $status = Alamat_kirim::where('user_id', Auth::user()->id)->where('status', 1)->first();

      if (empty($this->ongkir_terpilih)) {
        return view('pesan.konfirmasi_co', compact( 'pesanan_details','user','status') );//,'hasil_kota','hasil_biaya'
      }
      else{
        $ongkir_terpilih = $this->ongkir_terpilih;
        return view('pesan.konfirmasi_co', compact( 'pesanan_details','user','status','ongkir_terpilih') );//,'hasil_kota','hasil_biaya'
      }

    	

    }

    public function alamat(){
      
      $alamatk = Alamat_kirim::where('user_id', Auth::user()->id)->get();      
      return view('pesan/alamat_kirim', compact('alamatk'));

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
}
