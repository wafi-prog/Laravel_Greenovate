<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::all();
        return view('Artikel.index',compact('artikel'));
    }

    public function formartikel(){
        $kategori = Kategori::all();
        return view('Artikel.createArtikel',compact('kategori'));
      } 

      public function createartikel(Request $request){
        $categori = Kategori::find($request->kategori_id); 
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('image');
        $namafile = time(). '.' .$image->getClientOriginalExtension(); 
        $image->move( public_path('storage/img-artikel'),$namafile);

        Artikel::create([
            'artikel' => $request->artikel,
            'kategori_id' => $categori->id,
            'image'=> $namafile
        ]);
        
        return redirect()->route('index.artikel')->with('Create',"Berhasil menambah data");
    }

    public function deleteartikel(Request $request){
        $artikel = artikel::findOrFail($request->id);
        Storage::disk('public')->delete('img-artikel/' . $artikel->image);
        $artikel->delete();
        return redirect()->back()->with('Delete',"Berhasil menghapus cerita");    
    }

    public function editartikel($id){
        $artikel = artikel::findOrFail($id);
        $kategori = kategori::all();
        return view('Artikel.editartikel',compact('artikel','kategori'));
    
      }

      public function updateartikel(Request $request,$id){
        $artikel= artikel::findOrFail($id);
        if($request->file('image') == "" ){
          $artikel([
            'artikel'=> $request->artikel,
            'kategori_id'=> $request->kategori_id,
          'image' => $request->image
          ]);
        }else{
          $image = $request->file('image');
          $namafile = time(). '' .$image->getClientOriginalExtension();
          $image->move(public_path('storage/img-artikel'),$namafile);
        }
       
        $artikel->update([
            'artikel'=> $request->artikel,
            'kategori_id'=> $request->kategori_id,          
            'image' => $namafile
        ]);
       
        return redirect()->route('index.artikel')->with('Update', "Berhasil mengedit artikel");
      }
}
