<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\_d_e_v_i;
use Illuminate\Http\Request;


class DeviController extends Controller
{

    public function index()
    {
        $Devi = _d_e_v_i::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Devi retrieved successfully',
            'data' => $Devi,
            'total' => $Devi->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'status' => 'required|integer'
        ]);

        $Devi = _d_e_v_i::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Devi created successfully',
            'data' => $Devi
        ], 201); 
    }


    public function show(_d_e_v_i $Devi)
    {
        return response()->json([
            'success' => true,
            'message' => 'Devi retrieved successfully',
            'data' => $Devi
        ]);
    }


    public function update(Request $request, _d_e_v_i $Devi)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'status' => 'required|integer'
        ]);

        $Devi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Devi updated successfully',
            'data' => $Devi->fresh() 
        ]);
    }


    public function destroy(_d_e_v_i $Devi)
    {
        $Devi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Devi deleted successfully'
        ]);
    }
    
}
