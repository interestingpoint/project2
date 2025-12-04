<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;


class ArtController extends Controller
{

    public function index()
    {
        $Arts = Art::all();
        
        $html = '<h1>All Arts</h1>';
        $html .= '<a href="/Arts/create">Add New Art</a>';
        $html .= '<hr>';
        
        if ($Arts->count() > 0) {
            foreach ($Arts as $Art) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Art->name . '</h3>';
                $html .= '<p>size: ' . $Art->size . '</p>';
                $html .= '<p>artist: ' . $Art->artist . '</p>';
                $html .= '<a href="/Arts/' . $Art->id . '">View Details</a> | ';
                $html .= '<a href="/Arts/' . $Art->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Arts found. <a href="/Arts/create">Add the first Art</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Art.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer',
            'artist' => 'required|string|max:255'
        ]);

        $Art = Art::create($validated);
        
        return '<h1>Success!</h1>
                <p>Art created successfully!</p>
                <p>ID: ' . $Art->id . '</p>
                <p>Name: ' . $Art->name . '</p>
                <p>size: ' . $Art->size . '</p>
                <p>artist: ' . $Art->artist . '</p>
                <a href="/Arts">View All Arts</a> | 
                <a href="/Arts/create">Add Another</a>';
    }

    public function show(Art $Art)
    {
        
        return '<h1>Art Details</h1>
                <p>ID: ' . $Art->id . '</p>
                <p>Name: ' . $Art->name . '</p>
                <p>size: ' . $Art->size . '</p>
                <p>artist: ' . $Art->artist . '</p>
                <p><strong>Created:</strong> ' . $Art->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Art->updated_at . '</p>
                <hr>
                <a href="/Arts">Back to All Arts</a> | 
                <a href="/Arts/' . $Art->id . '/edit">Edit Art</a> |
                <form method="POST" action="/Arts/' . $Art->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Art $Art)
    {
        return view('Art.edit', compact('Art'));

    }


    public function update(Request $request, Art $Art)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer',
            'artist' => 'required|string|max:255'
        ]);

        $Art->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Art information updated successfully!</p>
                <p>Name: ' . $Art->name . '</p>
                <p>size: ' . $Art->size . '</p>
                <p>artist: ' . $Art->artist . '</p>
                <a href="/Arts/' . $Art->id . '">View Art</a> |
                <a href="/Arts">All Arts</a>';
    }


    public function destroy(Art $Art)
    {
        $name = $Art->name; 
        $Art->delete();
        
        return '<h1>Deleted!</h1>
                <p>Art "' . $name . '" has been removed from the database</p>
                <a href="/Arts">View All Arts</a> | 
                <a href="/Arts/create">Add New Art</a>';
    }



}
