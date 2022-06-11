<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Ramsey\Uuid\Uuid;
use App\Umkm;

class UmkmController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $umkm = Umkm::all();
        return view('pages.admin.umkm.view', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.umkm.create');
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

        'nama_UMKM'=>'required',
        // 'slug'=>'required',
        'nama_pemilik'=>'required',
        'no_hp'=>'required',
       'alamat_umkm'=>'required',
        ],
        [

        'nama_UMKM'=>'Nama Umkm Harus di isi',
        // 'slug'=>'',
        'nama_pemilik'=>'Nama Pemilik harus diisi',
        'no_hp'=>'Nomor Telepon harus diisi',
        'alamat_umkm'=>'Alamat harus diisi',

        ]);



        $umkm = new Umkm();
        // $umkm->id = Uuid::uuid4()->getHex();
        $umkm->nama_UMKM=$request->nama_UMKM;
        // // $umkm->slug=$request->slug;
        $umkm->nama_pemilik=$request->nama_pemilik;
        $umkm->no_hp=$request->no_hp;
        $umkm->alamat_umkm=$request->alamat_umkm;

        $umkm->save();
        return redirect()->route('umkm.index')->with('success','Berhasil input data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Umkm $umkm)
    {

        return view('pages.admin.umkm.edit', compact('umkm'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Umkm $umkm)
    {

        $this->validate($request, [
            'nama_UMKM'=>'required',
            // 'slug'=>'required',
            'nama_pemilik'=>'required',
            'no_hp'=>'required',
           'alamat_umkm'=>'required',
            ],
            [

            'nama_UMKM'=>'Nama Umkm Harus di isi',
            // 'slug'=>'',
            'nama_pemilik'=>'Nama Pemilik harus diisi',
            'no_hp'=>'Nomor Telepon harus diisi',
            'alamat_umkm'=>'Alamat harus diisi',

        ]);

        $umkm = Umkm::findorfail($umkm->id);
        $umkm->nama_UMKM=$request->nama_UMKM;
        // // $umkm->slug=$request->slug;
        $umkm->nama_pemilik=$request->nama_pemilik;
        $umkm->no_hp=$request->no_hp;
        $umkm->alamat_umkm=$request->alamat_umkm;

        $umkm->save();
        return redirect()->route('umkm.index')->with('success','Berhasil edit data!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umkm $umkm)
    {

        $umkm = Umkm::findOrfail($umkm->id);

        // Delete from directory
        // unlink($umkm->image);

        $umkm->delete();

        return redirect()->route('umkm.index')->with('delete','Berhasil hapus data!');

    }

    public function makePublish($id)
    {

        $umkm = Umkm::findorfail($id);

        if ($umkm->is_publish == 0)
        {

            $publish = 1;
            $message = "Data Berhasil di Terbitkan!";

        } else {

            $publish = 0;
            $message = "Data Batal Untuk di Terbitkan!";

        }

        $umkm->is_publish = $publish;
        $umkm->save();

        return redirect()->route('umkm.index')->with('success',$message);

    }

}
