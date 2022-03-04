<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Ramsey\Uuid\Uuid;


class AboutController extends Controller
{
          /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(request $request)
        {
            $about = About::all();
          return view('pages.admin.produk.view', compact('about'));
        }

        public function create()
        { return view('pages.admin.produk.create');
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'title'=>'required',
                'body'=>'required',
                'link'=>'required'
            ], [
                'title.required' => 'title harus diisi!',
                'body.required' => 'body harus diisi!',
                'link.required' => 'link harus diisi!',

            ]);

            $about = new About();
            $about->id = Uuid::uuid4()->getHex();
            $about->title = $request->title;
            $about->body = $request->body;
            $about->link = $request->link;

            $about->save();
            return redirect()->route('produk.index')->with('success','Berhasil input data!');

        }

        public function edit(About $about)
        {

            return view('pages.admin.produk.edit', compact('about'));

        }

        public function update(Request $request, About $about)
        {

            $this->validate($request, [
                'title'=>'required',
                'body'=>'required',
                'link'=>'required'
            ], [
                'title.required' => 'title harus diisi!',
                'body.required' => 'body harus diisi!',
                'link.required' => 'link harus diisi!',

            ]);

            $about = About::findorfail($about->id);
            $about->title = $request->title;
            $about->body = $request->body;
            $about->link = $request->link;

            $about->save();
            return redirect()->route('produk.index')->with('success','Berhasil edit data!');

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\about  $about
         * @return \Illuminate\Http\Response
         */
        public function destroy(About $about)
        {

            $about = About::findOrfail($about->id);

            // Delete from directory
            // unlink($about->image);
            $about->delete();
            return redirect()->route('produk.index')->with('delete','Berhasil hapus data!');

        }
}
