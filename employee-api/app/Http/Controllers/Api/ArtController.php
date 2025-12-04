<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Art;
use Illuminate\Http\Request;


class ArtController extends Controller
{

    public function index()
    {
        $Art = Art::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Art retrieved successfully',
            'data' => $Art,
            'total' => $Art->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer',
            'artist' => 'required|string|max:255'
        ]);

        $Art = Art::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Art created successfully',
            'data' => $Art
        ], 201); 
    }


    public function show(Art $Art)
    {
        return response()->json([
            'success' => true,
            'message' => 'Art retrieved successfully',
            'data' => $Art
        ]);
    }


    public function update(Request $request, Art $Art)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer',
            'artist' => 'required|string|max:255'
        ]);

        $Art->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Art updated successfully',
            'data' => $Art->fresh() 
        ]);
    }


    public function destroy(Art $Art)
    {
        $Art->delete();

        return response()->json([
            'success' => true,
            'message' => 'Art deleted successfully'
        ]);
    }
    
}
