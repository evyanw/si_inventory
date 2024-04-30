<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
// use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        // $kategori = kategori::latest()->paginate(10);        
        // return DB::table('kategori')->get();
        $kategori = DB::table('kategori')->select('id','kategori', 
        DB::raw('ketKategoriko (jenis) as ketKategori'))->paginate(10);
        return view ('kategori.index', compact('kategori'));
    }

    public function create()
    {
        $aKategori = array('blank'=>'Pilih Kategori',
                            'M'=>'kategori Modal',
                            'A'=>'Alat',
                            'BHP'=>'Bahan Habis Pakai',
                            'BTHP'=>'Bahan Tidak Habis Pakai'
                            );
        return view('kategori.create',compact('aKategori'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'kategori'   => 'required',
            'jenis'     => 'required | in:M,A,BHP,BTHP',
        ]);


        //create post
        Kategori::create([
            'kategori'  => $request->kategori,
            'jenis'  => $request->jenis,
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $kategori = Kategori::find($id);

        return view('kategori.show', compact('kategori'));
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        //delete image
        // Storage::delete('public/foto/'. $barang->foto);

        //delete post
        $kategori->delete();

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Kategori Berhasil Dihapus!']);
    }

    function kategoriAPI(){
        $kategori = Kategori::all();
        $data = array("data"=>$kategori);

        return response()->json($data);
    }

}
