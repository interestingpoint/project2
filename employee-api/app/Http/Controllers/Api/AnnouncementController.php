<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{

    public function index()
    {
        $Announcement = Announcement::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Announcement retrieved successfully',
            'data' => $Announcement,
            'total' => $Announcement->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'location' => 'required|string|max:255'
        ]);

        $Announcement = Announcement::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Announcement created successfully',
            'data' => $Announcement
        ], 201); 
    }


    public function show(Announcement $Announcement)
    {
        return response()->json([
            'success' => true,
            'message' => 'Announcement retrieved successfully',
            'data' => $Announcement
        ]);
    }


    public function update(Request $request, Announcement $Announcement)
    {
        $validated = $request->validate([
            'text' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255'
        ]);

        $Announcement->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Announcement updated successfully',
            'data' => $Announcement->fresh() 
        ]);
    }


    public function destroy(Announcement $Announcement)
    {
        $Announcement->delete();

        return response()->json([
            'success' => true,
            'message' => 'Announcement deleted successfully'
        ]);
    }
    
}
