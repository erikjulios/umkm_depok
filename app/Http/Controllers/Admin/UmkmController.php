<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Ramsey\Uuid\Uuid;
use App\UMKM;
use App\Cabang;

class UmkmController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $umkm = UMKM::paginate(10);
        return view('pages.admin.umkm.view', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.umkm.create', [
            
            "cabang" => Cabang::all()        ]);
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
       'cabang'=>'required',
        ],
        [

        'nama_UMKM'=>'Nama Umkm Harus di isi',
        // 'slug'=>'',
        'nama_pemilik'=>'Nama Pemilik harus diisi',
        'no_hp'=>'Nomor Telepon harus diisi',
        'alamat_umkm'=>'Alamat harus diisi',
        'cabang'=>'Cabang harus diisi',

        ]);



        $umkm = new UMKMUMKM();
        // $umkm->id = Uuid::uuid4()->getHex();
        $umkm->nama_UMKM=$request->nama_UMKM;
        // // $umkm->slug=$request->slug;
        $umkm->nama_pemilik=$request->nama_pemilik;
        $umkm->no_hp=$request->no_hp;
        $umkm->alamat_umkm=$request->alamat_umkm;
        $umkm->cabang_id=$request->cabang;

        $umkm->save();
        return redirect()->route('umkm.index')->with('success','Berhasil input data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UMKMUMKM  $umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(UMKMUMKM $umkm)
    {

        return view('pages.admin.umkm.edit', compact('umkm'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UMKMUMKM  $umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UMKMUMKM $umkm)
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

        $umkm = UMKMUMKM::findorfail($umkm->id);
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
     * @param  \App\UMKM  $umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(UMKM $umkm)
    {

        $umkm = UMKM::findOrfail($umkm->id);

        // Delete from directory
        // unlink($umkm->image);

        $umkm->delete();

        return redirect()->route('umkm.index')->with('delete','Berhasil hapus data!');

    }

    public function makePublish($id)
    {

        $umkm = UMKM::findorfail($id);

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
