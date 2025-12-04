<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;


class HomeworkController extends Controller
{

    public function index()
    {
        $Homework = Homework::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Homework retrieved successfully',
            'data' => $Homework,
            'total' => $Homework->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'questions' => 'required|integer',
            'class' => 'required|string|max:255'
        ]);

        $Homework = Homework::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Homework created successfully',
            'data' => $Homework
        ], 201); 
    }


    public function show(Homework $Homework)
    {
        return response()->json([
            'success' => true,
            'message' => 'Homework retrieved successfully',
            'data' => $Homework
        ]);
    }


    public function update(Request $request, Homework $Homework)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'questions' => 'required|integer',
            'class' => 'required|string|max:255'
        ]);

        $Homework->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Homework updated successfully',
            'data' => $Homework->fresh() 
        ]);
    }


    public function destroy(Homework $Homework)
    {
        $Homework->delete();

        return response()->json([
            'success' => true,
            'message' => 'Homework deleted successfully'
        ]);
    }
    
}
