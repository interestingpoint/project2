<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calender;
use Illuminate\Http\Request;


class CalenderController extends Controller
{

    public function index()
    {
        $Calender = Calender::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Calender retrieved successfully',
            'data' => $Calender,
            'total' => $Calender->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'event' => 'required|string|max:255'
        ]);

        $Calender = Calender::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Calender created successfully',
            'data' => $Calender
        ], 201); 
    }


    public function show(Calender $Calender)
    {
        return response()->json([
            'success' => true,
            'message' => 'Calender retrieved successfully',
            'data' => $Calender
        ]);
    }


    public function update(Request $request, Calender $Calender)
    {
        $validated = $request->validate([
            'date' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'event' => 'required|string|max:255'
        ]);

        $Calender->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Calender updated successfully',
            'data' => $Calender->fresh() 
        ]);
    }


    public function destroy(Calender $Calender)
    {
        $Calender->delete();

        return response()->json([
            'success' => true,
            'message' => 'Calender deleted successfully'
        ]);
    }
    
}
