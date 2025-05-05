<?php

namespace App\Http\Controllers;

use App\Models\craft;
use App\Models\filter;
use Illuminate\Http\Request;

class CraftController extends Controller
{
    public function index(){
        $craft = craft::all();
        $filter = filter::all();
        return view('Craft.craft',compact('craft','filter'));
    }

    public function formcraft(){
        $filter = filter::all();
        return view('craft.createcraft',compact('filter'));
      } 

      public function createcraft(Request $request){
      
        $filter = filter::find($request->filter_id); 
        craft::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'filter_id' => $filter->id,
            'tutorial' => $request->tutorial,
            'link_yt' => $request->link_yt,
        ]);
        return redirect()->back()->with('Create',"Berhasil menambah data");
    }




    public function deletecraft(Request $request){

        $craft = craft::findOrFail($request->id);
        $craft->delete();
        return redirect()->back()->with('Delete',"Berhasil menghapus data Genre");
        
    }
























    public function filter(){
        $filter = filter::all();
        return view('filter.filter',compact('filter'));
    }

    public function createfilter(Request $request){
        filter::create([
            'filter' => $request->filter,
        ]);
        return redirect()->back()->with('Create',"Berhasil menambah data");
    }
    
}
