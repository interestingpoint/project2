<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;


class AudioController extends Controller
{

    public function index()
    {
        $Audios = Audio::all();
        
        $html = '<h1>All Audios</h1>';
        $html .= '<a href="/Audios/create">Add New Audio</a>';
        $html .= '<hr>';
        
        if ($Audios->count() > 0) {
            foreach ($Audios as $Audio) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Audio->name . '</h3>';
                $html .= '<p>size: ' . $Audio->size . '</p>';
                $html .= '<a href="/Audios/' . $Audio->id . '">View Details</a> | ';
                $html .= '<a href="/Audios/' . $Audio->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Audios found. <a href="/Audios/create">Add the first Audio</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Audio.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer'
        ]);

        $Audio = Audio::create($validated);
        
        return '<h1>Success!</h1>
                <p>Audio created successfully!</p>
                <p>ID: ' . $Audio->id . '</p>
                <p>Name: ' . $Audio->name . '</p>
                <p>size: ' . $Audio->size . '</p>
                <a href="/Audios">View All Audios</a> | 
                <a href="/Audios/create">Add Another</a>';
    }

    public function show(Audio $Audio)
    {
        
        return '<h1>Audio Details</h1>
                <p><strong>ID:</strong> ' . $Audio->id . '</p>
                <p><strong>Name:</strong> ' . $Audio->name . '</p>
                <p><strong>size:</strong> ' . $Audio->size . '</p>
                <p><strong>Created:</strong> ' . $Audio->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Audio->updated_at . '</p>
                <hr>
                <a href="/Audios">Back to All Audios</a> | 
                <a href="/Audios/' . $Audio->id . '/edit">Edit Audio</a> |
                <form method="POST" action="/Audios/' . $Audio->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Audio $Audio)
    {
        return view('Audio.edit', compact(var_name: 'Audio'));

    }


    public function update(Request $request, Audio $Audio)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|integer'
        ]);

        $Audio->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Audio information updated successfully!</p>
                <p>Name: ' . $Audio->name . '</p>
                <p>Email: ' . $Audio->size . '</p>
                <a href="/Audios/' . $Audio->id . '">View Audio</a> |
                <a href="/Audios">All Audios</a>';
    }


    public function destroy(Audio $Audio)
    {
        $name = $Audio->name; 
        $Audio->delete();
        
        return '<h1>Deleted!</h1>
                <p>Audio "' . $name . '" has been removed from the database</p>
                <a href="/Audios">View All Audios</a> | 
                <a href="/Audios/create">Add New Audio</a>';
    }



}
