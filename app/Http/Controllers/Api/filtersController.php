<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\filter;
use Illuminate\Http\Request;

class filtersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $filters = filter::orderBy('filter', 'ASC')->get();
        return response()->json(['status' => 'success', 'data' => $filters], 200);
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
