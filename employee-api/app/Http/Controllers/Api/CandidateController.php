<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;


class CandidateController extends Controller
{

    public function index()
    {
        $Candidate = Candidate::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Candidate retrieved successfully',
            'data' => $Candidate,
            'total' => $Candidate->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'votes' => 'required|integer',
            'position' => 'required|string|max:255'
        ]);

        $Candidate = Candidate::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Candidate created successfully',
            'data' => $Candidate
        ], 201); 
    }


    public function show(Candidate $Candidate)
    {
        return response()->json([
            'success' => true,
            'message' => 'Candidate retrieved successfully',
            'data' => $Candidate
        ]);
    }


    public function update(Request $request, Candidate $Candidate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'votes' => 'required|integer',
            'position' => 'required|string|max:255'
        ]);

        $Candidate->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Candidate updated successfully',
            'data' => $Candidate->fresh() 
        ]);
    }


    public function destroy(Candidate $Candidate)
    {
        $Candidate->delete();

        return response()->json([
            'success' => true,
            'message' => 'Candidate deleted successfully'
        ]);
    }
    
}
