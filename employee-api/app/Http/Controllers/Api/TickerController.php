<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticker;
use Illuminate\Http\Request;


class TickerController extends Controller
{

    public function index()
    {
        $Ticker = Ticker::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Ticker retrieved successfully',
            'data' => $Ticker,
            'total' => $Ticker->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'symbol' => 'required|string|max:255',
            'full name' => 'required|string|max:255',
            'is_up' => 'required|integer'
        ]);

        $Ticker = Ticker::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Ticker created successfully',
            'data' => $Ticker
        ], 201); 
    }


    public function show(Ticker $Ticker)
    {
        return response()->json([
            'success' => true,
            'message' => 'Ticker retrieved successfully',
            'data' => $Ticker
        ]);
    }


    public function update(Request $request, Ticker $Ticker)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $Ticker->id,
            'major' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required|integer|min:1|max:4'
        ]);

        $Ticker->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Ticker updated successfully',
            'data' => $Ticker->fresh() 
        ]);
    }


    public function destroy(Ticker $Ticker)
    {
        $Ticker->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ticker deleted successfully'
        ]);
    }
    
}
