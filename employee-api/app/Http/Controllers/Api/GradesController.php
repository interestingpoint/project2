<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use Illuminate\Http\Request;


class GradesController extends Controller
{

    public function index()
    {
        $Grades = Grades::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Grades retrieved successfully',
            'data' => $Grades,
            'total' => $Grades->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'english grade' => 'required|string|max:255',
            'math grade' => 'required|string|max:255',
            'ss grade' => 'required|string|max:255'
        ]);

        $Grades = Grades::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Grades created successfully',
            'data' => $Grades
        ], 201); 
    }


    public function show(Grades $Grades)
    {
        return response()->json([
            'success' => true,
            'message' => 'Grades retrieved successfully',
            'data' => $Grades
        ]);
    }


    public function update(Request $request, Grades $Grades)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'english grade' => 'required|string|max:255',
            'math grade' => 'required|string|max:255',
            'ss grade' => 'required|string|max:255'
        ]);

        $Grades->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Grades updated successfully',
            'data' => $Grades->fresh() 
        ]);
    }


    public function destroy(Grades $Grades)
    {
        $Grades->delete();

        return response()->json([
            'success' => true,
            'message' => 'Grades deleted successfully'
        ]);
    }
    
}
