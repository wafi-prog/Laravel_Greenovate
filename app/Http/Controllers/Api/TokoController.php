<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $toko = Toko::where('user_id', Auth::id())->first();

    return response()->json([
        'message' => 'Toko ditemukan',
        'data' => $toko,
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'about' => 'required|string|max:255',
            'nama_toko' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'img_ktp' => 'required|image',
        ]);

        // Simpan file KTP
        $imgPath = $request->file('img_ktp')->store('ktp', 'public');

        $toko = Toko::create([
            'user_id' => Auth::id(),
            'about' => $validated['about'],
            'nama_toko' => $validated['nama_toko'],
            'lokasi' => $validated['lokasi'],
            'img_ktp' => $imgPath,
            'status' => 'pending', // default
        ]);

        return response()->json([
            'message' => 'Toko berhasil dibuat!',
            'data' => $toko
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
