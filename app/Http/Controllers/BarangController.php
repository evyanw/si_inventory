<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{

    public function index(Request $request)
    {
        $barang = Barang::latest()->paginate(10);        
        return view('barang.index',compact('barang'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $aKategori = Kategori::all();
        return view('barang.create', compact('aKategori'));
    }

    public function store(Request $request)
    {
        //return $request;
        //validate form
        $this->validate($request, [
            'merk'              => 'required',
            'seri'              => 'required',
            'spesifikasi'       => 'required',
            'stok'              => 'required',
            'kategori_id'       => 'required',
            // 'foto'              => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //upload image
        // $foto = $request->file('foto');
        // $foto->storeAs('public/foto', $foto->hashName());
        //create post
        Barang::create([
            'merk'              => $request->merk,
            'seri'              => $request->seri,
            'spesifikasi'       => $request->spesifikasi,
            'stok'              => $request->stok,
            'kategori_id'       => $request->kategori_id,
            // 'foto'              => $foto->hashName()
        ]);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $barang = Barang::find($id);

        //return view
        return view('barang.show', compact('barang'));
    }

    public function edit(string $id)
    {
    $akategori = Kategori::all();
    $barang = Barang::find($id);
    $selectedKategori = Kategori::find($barang->kategori_id);

    return view('barang.edit', compact('barang', 'akategori', 'selectedKategori'));
    }


    public function update(Request $request, string $id)
    {
        
        
        $this->validate($request, [
            'merk'              => 'required',
            'seri'              => 'required',
            'spesifikasi'       => 'required',
            'stok'              => 'required',
            'kategori_id'       => 'required',
            // 'foto'              => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $barang = Barang::find($id);

        //check if image is uploaded
        // if ($request->hasFile('foto')) {

            //upload new image
            // $foto = $request->file('foto');
            // $foto->storeAs('public/foto', $foto->hashName());

            //delete old image
            // Storage::delete('public/foto/'.$barang->foto);

            // //update post with new image
            // $barang->update([
            //     'merk'              => $request->merk,
            //     'seri'              => $request->seri,
            //     'spesifikasi'       => $request->spesifikasi,
            //     'stok'              => $request->stok,
            //     'kategori_id'       => $request->kategori_id,
            //     'foto'              => $foto->hashName()
            // ]);

        // } else {

            //update post without image
            $barang->update([
                'merk'              => $request->merk,
                'seri'              => $request->seri,
                'spesifikasi'       => $request->spesifikasi,
                'stok'              => $request->stok,
                'kategori_id'       => $request->kategori_id
            ]);
        // }

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Barang Berhasil Diubah!']);

    }

    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        //delete image
        // Storage::delete('public/foto/'. $barang->foto);

        //delete post
        $barang->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Barang Berhasil Dihapus!']);
    }
}
