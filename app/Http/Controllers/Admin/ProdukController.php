<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $produk = Produk::all();
        return view('pages.admin.produk.view', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        $this->validate($request, [

            'nama_produk'=>'required',
            'slug'=>'required',
            'foto_produk'=>'required|max:2048',
            'berat_unit'=>'required',
            'harga_unit'=>'required',
            'komposisi'=>'required',
            'stok_tersedia'=>'required',
            'produk_terjual'=>'required',
            'deskripsi'=>'required',
            'varian'=>'required',
            'varian_tersedia'=>'required',
            'ketersediaan_produk'=>'required',
            'no_BPOM'=>'required',
            'rating'=>'required',
            'diskon'=>'required',

        ],
        [
'nama_produk'=>'Nama Produk Wajib Diisi',
'slug'=>'Tittle Wajib Diisi',
// 'foto_produk'=>'Foto Produk Wajib Diisi',
'foto_produk.required' => 'Gambar harus diisi!',
'foto_produk.mimes' => 'Gambar harus berformat jpg,jpeg atau png',
'foto_produk.max' => 'Ukuran gambar maksimal harus berukuran 2048',
'berat_unit'=>'Berat Wajib Diisi',
'harga_unit'=>'Harga Wajib Diisi',
'komposisi'=>'Komposisi Wajib Diisi',
'stok_tersedia'=>'Stock Wajib Diisi',
'produk_terjual'=>'Produk terjual Wajib Diisi',
'deskripsi'=>'deskripsi Wajib Diisi',
'varian'=>'varian Wajib Diisi',
'varian_tersedia'=>'varian tersedia Wajib Diisi',
'ketersediaan_produk'=>'ketersediaan Wajib Diisi',
'no_BPOM'=>'No BPOM Wajib Diisi',
'rating'=>'Rating Wajib Diisi',
'diskon'=>'diskon harus Diisi',

        ]);



        $produk = new Produk();
        $produk->id = Uuid::uuid4()->getHex();

        $produk->nama_produk = $request->nama_produk;
        $produk->slug = $request->slug;
        $produk->foto_produk = $request->foto_produk;
        $produk->berat_unit = $request->berat_unit;
        $produk->harga_unit = $request->harga_unit;
        $produk->komposisi = $request->komposisi;
        $produk->stok_tersedia = $request->stok_tersedia;
        $produk->produk_terjual = $request->produk_terjual;
        $produk->deskripsi = $request->deskripsi;
        $produk->varian = $request->varian;
        $produk->varian_tersedia = $request->varian_tersedia;
        $produk->ketersediaan_produk = $request->ketersediaan_produk;
        $produk->no_BPOM = $request->no_BPOM;
        $produk->rating = $request->rating;
        $produk->diskon = $request->diskon;

        if($request->has('foto_produk'))
        {
            $file = $request->foto_produk;
            $filename = 'upload/produk/' . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/produk',$filename);
            $produk->foto_produk = $filename;
        }


        $produk->save();
        return redirect()->route('produk.index')->with('success','Berhasil input data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {

        return view('pages.admin.produk.edit', compact('produk'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {

        $this->validate($request, [

            'nama_produk'=>'required',
            'slug'=>'required',
            'foto_produk'=>'max:10240',
            'berat_unit'=>'required',
            'harga_unit'=>'required',
            'komposisi'=>'required',
            'stok_tersedia'=>'required',
            'produk_terjual'=>'required',
            'deskripsi'=>'required',
            'varian'=>'required',
            'varian_tersedia'=>'required',
            'ketersediaan_produk'=>'required',
            'no_BPOM'=>'required',
            'rating'=>'required',
            'diskon'=>'required',

        ],
        [
'nama_produk'=>'Nama Produk Wajib Diisi',
'slug'=>'Tittle Wajib Diisi',
// 'foto_produk'=>'Foto Produk Wajib Diisi',
// 'foto_produk.required' => 'Gambar harus diisi!',
'foto_produk.mimes' => 'Gambar harus berformat jpg,jpeg atau png',
'foto_produk.max' => 'Ukuran gambar maksimal harus berukuran 10240',

'berat_unit'=>'Berat Wajib Diisi',
'harga_unit'=>'Harga Wajib Diisi',
'komposisi'=>'Komposisi Wajib Diisi',
'stok_tersedia'=>'Stock Wajib Diisi',
'produk_terjual'=>'Produk terjual Wajib Diisi',
'deskripsi'=>'deskripsi Wajib Diisi',
'varian'=>'varian Wajib Diisi',
'varian_tersedia'=>'varian tersedia Wajib Diisi',
'ketersediaan_produk'=>'ketersediaan Wajib Diisi',
'no_BPOM'=>'No BPOM Wajib Diisi',
'rating'=>'Rating Wajib Diisi',
'diskon'=>'diskon harus Diisi',

        ]);

        $produk = Produk::findorfail($produk->id);
        $produk->nama_produk = $request->nama_produk;
        $produk->slug = $request->slug;
        // $produk->foto_produk = $request->foto_produk;
        $produk->berat_unit = $request->berat_unit;
        $produk->harga_unit = $request->harga_unit;
        $produk->komposisi = $request->komposisi;
        $produk->stok_tersedia = $request->stok_tersedia;
        $produk->produk_terjual = $request->produk_terjual;
        $produk->deskripsi = $request->deskripsi;
        $produk->varian = $request->varian;
        $produk->varian_tersedia = $request->varian_tersedia;
        $produk->ketersediaan_produk = $request->ketersediaan_produk;
        $produk->no_BPOM = $request->no_BPOM;
        $produk->rating = $request->rating;
        $produk->diskon = $request->diskon;
        if (empty($request->file('foto_produk'))){

            $produk->foto_produk = $produk->foto_produk;

        } else {

            unlink($produk->foto_produk); //menghapus file lama

            $file = $request->foto_produk;
            $filename = 'upload/produk/' . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/produk',$filename);
            $produk->foto_produk = $filename;

        }

        $produk->save();
        return redirect()->route('produk.index')->with('success','Berhasil edit data!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {

        $produk = Produk::findOrfail($produk->id);

        // Delete from directory
        unlink($produk->foto_produk);

        $produk->delete();

        return redirect()->route('produk.index')->with('delete','Berhasil hapus data!');

    }

    public function makePublish($id)
    {

        $produk = Produk::findorfail($id);

        if ($produk->is_publish == 0)
        {

            $publish = 1;
            $message = "Data Berhasil di Terbitkan!";

        } else {

            $publish = 0;
            $message = "Data Batal Untuk di Terbitkan!";

        }

        $produk->is_publish = $publish;
        $produk->save();

        return redirect()->route('produk.index')->with('success',$message);

    }

}

