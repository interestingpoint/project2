<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{

    public function index()
    {
        $Announcement = Announcement::all();
        
        $html = '<h1>All Announcement</h1>';
        $html .= '<a href="/announcement/create">Add New Announcement</a>';
        $html .= '<hr>';
        
        if ($Announcement->count() > 0) {
            foreach ($Announcement as $Announcement) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Announcement->text . '</h3>';
                $html .= '<p>Email: ' . $Announcement->location . '</p>';
                $html .= '<a href="/announcement/' . $Announcement->id . '">View Details</a> | ';
                $html .= '<a href="/announcement/' . $Announcement->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Announcement found. <a href="/announcement/create">Add the first Announcement</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        
        return view('Announcement.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'location' => 'required|string|max:255'
        ]);

        $Announcement = Announcement::create($validated);
        
        return '<h1>Success!</h1>
                <p>Announcement created successfully!</p>
                <p>ID: ' . $Announcement->id . '</p>
                <p>Name: ' . $Announcement->text . '</p>
                <p>Email: ' . $Announcement->location . '</p>
                <a href="/announcement">View All Announcement</a> | 
                <a href="/announcement/create">Add Another</a>';
    }

    public function show(Announcement $Announcement)
    {
        
        return '<h1>Announcement Details</h1>
                <p><strong>ID:</strong> ' . $Announcement->id . '</p>
                <p><strong>Name:</strong> ' . $Announcement->text . '</p>
                <p><strong>Email:</strong> ' . $Announcement->location . '</p>
                <p><strong>Created:</strong> ' . $Announcement->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Announcement->updated_at . '</p>
                <hr>
                <a href="/announcement">Back to All Announcement</a> | 
                <a href="/announcement/' . $Announcement->id . '/edit">Edit Announcement</a> |
                <form method="POST" action="/announcement/' . $Announcement->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Announcement $Announcement)
    {
        return view('Announcement.edit', compact('Announcement'));
    }


    public function update(Request $request, Announcement $Announcement)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'location' => 'required|string|max:255'
        ]);

        $Announcement->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Announcement information updated successfully!</p>
                <p>Name: ' . $Announcement->text . '</p>
                <p>Email: ' . $Announcement->location . '</p>
                <a href="/announcement/' . $Announcement->id . '">View Announcement</a> |
                <a href="/announcement">All Announcement</a>';
    }


    public function destroy(Announcement $Announcement)
    {
        $name = $Announcement->name;
        $Announcement->delete();
        
        return '<h1>Deleted!</h1>
                <p>Announcement "' . $name . '" has been removed from the database</p>
                <a href="/announcement">View All Announcement</a> | 
                <a href="/announcement/create">Add New Announcement</a>';
    }



}
