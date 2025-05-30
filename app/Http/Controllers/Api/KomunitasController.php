<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomunitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$kategoriId)
{
    $komunitas = Komunitas::where('kategori_id',$kategoriId)->with('user')->get();
    return response()->json($komunitas);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'message' => 'nullable|string',
        'image' => 'nullable|image',
        'kategori_id' => 'required',
    ]);

    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('chats', 'public');
    }

    $komunitas = Komunitas::create([
        'user_id' => Auth::id(),
        'message' => $request->message,
        'image' => $path,
        'kategori_id' => $request->kategori_id,
    ]);

    return response()->json($komunitas, 201);
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
