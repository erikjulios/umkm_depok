<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Ramsey\Uuid\Uuid;
use App\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $transaksi = Transaksi::all();
        return view('pages.admin.transaksi.view', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.transaksi.create');
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

            'nominal_transaksi'=>'Required',
            'kode_VA'=>'Required',
            'no_rekening'=>'Required',
            'waktu_pembayaran'=>'Required',
            'status_validasi'=>'Required',
         ],
            [

            'nominal_transaksi'=>'Nominal Transaksi Harus diisi',
            'kode_VA'=>' Kode VA Harus diisi',
            'no_rekening'=>'Nomor Rekening Harus diisi',
            'waktu_pembayaran'=>'Waktu Pembayaran Harus diisi',
            'status_validasi'=>'Status Harus diisi',

        ]);



        $transaksi = new Transaksi();
        // $transaksi->id = Uuid::uuid4()->getHex();
        $transaksi->nominal_transaksi=$request->nominal_transaksi;
        
        $transaksi->kode_VA=$request->kode_VA;
        $transaksi->no_rekening=$request->no_rekening;
        $transaksi->waktu_pembayaran=$request->waktu_pembayaran;
        $transaksi->status_validasi=$request->status_validasi;

        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success','Berhasil input data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {

        return view('pages.admin.transaksi.edit', compact('transaksi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //$transaksi = Transaksi::where($transaksi->id)->first();
        $transaksi = Transaksi::findorfail($transaksi->id);
       

        $transaksi->status = 'dikirim';
        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success','Pesanan akan dikemas');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {

        $transaksi = Transaksi::findOrfail($transaksi->id);

        // Delete from directory
        // unlink($transaksi->image);

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('delete','Berhasil hapus data!');

    }

    public function makePublish($id)
    {

        $transaksi = Transaksi::findorfail($id);

        if ($transaksi->is_publish == 0)
        {

            $publish = 1;
            $message = "Data Berhasil di Terbitkan!";

        } else {

            $publish = 0;
            $message = "Data Batal Untuk di Terbitkan!";

        }

        $transaksi->is_publish = $publish;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success',$message);

    }

}
