<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     public function index(Request $request)
// {
   
//     $artikels = Artikel::select('title', 'artikel', 'image', 'kategori_id')
//                         ->orderBy('title', 'ASC')
//                         ->get();

//     return response()->json([
//         'status' => 'success',
//         'data' => $artikels
//     ], 200);
// }
   
    public function index(Request $request)
{
    $query = Artikel::query();

    
    if ($request->has('kategoriId')) {
        $query->where('kategori_id', $request->kategoriId);
    }

    $artikels = $query->get();

    return response()->json([
        'success' => true,
        'data' => $artikels,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
