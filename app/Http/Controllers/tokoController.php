<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class tokoController extends Controller
{
        public function index(){
        $toko = Toko::all();
        return view('toko.index',compact('toko'));
    }

     public function updateStatus(Request $request, $id){
        $toko = Toko::findOrFail($id);
        if ($request->status == 'verified'){
            $toko->status = 'verified';
        }else{
            $toko->status = 'pending';
        }

     $toko->save();
     return redirect()->back()->with('statusUpdate');
        
    }
}
