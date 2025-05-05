<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class kategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('kategori.kategori',compact('kategori'));
    }

    public function createcategori(Request $request){
        Kategori::create([
            'categori' => $request->categori,
            'slug' => str::slug($request->categori)
        ]);
        return redirect()->back()->with('Create',"Berhasil menambah data");
    }

    public function updatecategori(Request $request, $id){
        $kategori = kategori::findOrFail( $id);

        $kategori->categori = $request->categori;
        $kategori-> slug = Str::slug($request->categori);
        $kategori->update();
        return redirect()->back()->with('Update',"Berhasil mengedit  $request->categori");
        
    }
    public function deletecategori(Request $request){

        $kategori = kategori::findOrFail($request->id);
        $kategori->delete();
        return redirect()->back()->with('Delete',"Berhasil menghapus data Genre");
        
    }

}
