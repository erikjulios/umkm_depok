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
        $transaksi = Transaksi::paginate(10);
        return view('pages.admin.transaksi.view', compact('transaksi'));
    }
    

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
   

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
        return redirect()->route('transaksi.index')->with('success','Pesanan dikirim');

        
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
