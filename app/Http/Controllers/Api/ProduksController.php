<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $products = produk::with(['kategori', 'toko', 'user'])->get();

    return response()->json([
        'status' => 'success',
        'data' => $products
    ], 200);
}

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'kategori_id' => 'required',
        'nama' => 'required',
        'harga' => 'required',
        'toko_id' => 'required',
        'image' => 'nullable|image|mimes:png,jpg,jpeg',
        'description' => 'required',
    ]);

    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('produks', 'public'); 
    }

    $product = new produk;
    $product->kategori_id = $request->kategori_id;
    $product->nama = $request->nama;
    $product->harga = $request->harga;
    $product->user_id = Auth::id();
    $product->toko_id = $request->toko_id;
    $product->description = $request->description ?? '';
    $product->image = $path; // simpan path langsung
    $product->save();

    // Ambil data relasi
    $product = produk::with(['kategori', 'user', 'toko'])->find($product->id);

    return response()->json([
        'status' => 'success',
        'data' => $product
    ], 200);
}


    /**
     * Display the specified resource.
     */
   public function show($id)
{
    // Cari produk berdasarkan id, sekaligus eager load relasi kategori, user, toko
    $product = produk::with(['kategori', 'user', 'toko'])->find($id);

    if (!$product) {
        return response()->json([
            'status' => 'error',
            'message' => 'Produk tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'data' => $product
    ], 200);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product =produk::find($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['status' => 'success', 'message' => 'Product deleted'], 200);
    }
}
