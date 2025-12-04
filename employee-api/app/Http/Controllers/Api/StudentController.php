<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temp;
use Illuminate\Http\Request;


class TempController extends Controller
{

    public function index()
    {
        $temp = Temp::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Temp retrieved successfully',
            'data' => $temp,
            'total' => $temp->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'major' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:4'
        ]);

        $temp = Temp::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Temp created successfully',
            'data' => $temp
        ], 201); 
    }


    public function show(Temp $temp)
    {
        return response()->json([
            'success' => true,
            'message' => 'temp retrieved successfully',
            'data' => $temp
        ]);
    }


    public function update(Request $request, Temp $temp)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $temp->id,
            'major' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required|integer|min:1|max:4'
        ]);

        $temp->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'temp updated successfully',
            'data' => $temp->fresh() 
        ]);
    }


    public function destroy(Temp $temp)
    {
        $temp->delete();

        return response()->json([
            'success' => true,
            'message' => 'temp deleted successfully'
        ]);
    }
    
}
