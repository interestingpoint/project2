<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use Illuminate\Http\Request;


class AudioController extends Controller
{

    public function index()
    {
        $Audio = Audio::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Audio retrieved successfully',
            'data' => $Audio,
            'total' => $Audio->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer'
        ]);

        $Audio = Audio::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Audio created successfully',
            'data' => $Audio
        ], 201); 
    }


    public function show(Audio $Audio)
    {
        return response()->json([
            'success' => true,
            'message' => 'Audio retrieved successfully',
            'data' => $Audio
        ]);
    }


    public function update(Request $request, Audio $Audio)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'size' => 'sometimes|required|integer'
        ]);

        $Audio->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Audio updated successfully',
            'data' => $Audio->fresh() 
        ]);
    }


    public function destroy(Audio $Audio)
    {
        $Audio->delete();

        return response()->json([
            'success' => true,
            'message' => 'Audio deleted successfully'
        ]);
    }
    
}
