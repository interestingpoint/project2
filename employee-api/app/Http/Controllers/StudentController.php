<?php

namespace App\Http\Controllers;

use App\Models\Temp;
use Illuminate\Http\Request;


class TempController extends Controller
{

    public function index()
    {
        $Temps = Temp::all();
        
        $html = '<h1>All Temps</h1>';
        $html .= '<a href="/Temps/create">Add New Temp</a>';
        $html .= '<hr>';
        
        if ($Temps->count() > 0) {
            foreach ($Temps as $Temp) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Temp->name . '</h3>';
                $html .= '<p>Email: ' . $Temp->email . '</p>';
                $html .= '<p>Major: ' . $Temp->major . '</p>';
                $html .= '<p>Year: ' . $Temp->year . '</p>';
                $html .= '<a href="/Temps/' . $Temp->id . '">View Details</a> | ';
                $html .= '<a href="/Temps/' . $Temp->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Temps found. <a href="/Temps/create">Add the first Temp</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return '<h1>Add New Temp</h1>
                <form method="POST" action="/Temps">
                    <p>Name: <input type="text" name="name" required></p>
                    <p>Email: <input type="email" name="email" required></p>
                    <p>Major: <input type="text" name="major" required></p>
                    <p>Year: 
                        <select name="year" required>
                            <option value="">Select Year</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </p>
                    <p><button type="submit">Create Temp</button></p>
                </form>
                <a href="/Temps">Cancel</a>';
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:Temps',
            'major' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:4'
        ]);

        $Temp = Temp::create($validated);
        
        return '<h1>Success!</h1>
                <p>Temp created successfully!</p>
                <p>ID: ' . $Temp->id . '</p>
                <p>Name: ' . $Temp->name . '</p>
                <p>Email: ' . $Temp->email . '</p>
                <p>Major: ' . $Temp->major . '</p>
                <p>Year: ' . $Temp->year . '</p>
                <a href="/Temps">View All Temps</a> | 
                <a href="/Temps/create">Add Another</a>';
    }

    public function show(Temp $Temp)
    {
        
        return '<h1>Temp Details</h1>
                <p><strong>ID:</strong> ' . $Temp->id . '</p>
                <p><strong>Name:</strong> ' . $Temp->name . '</p>
                <p><strong>Email:</strong> ' . $Temp->email . '</p>
                <p><strong>Major:</strong> ' . $Temp->major . '</p>
                <p><strong>Year:</strong> ' . $Temp->year . '</p>
                <p><strong>Created:</strong> ' . $Temp->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Temp->updated_at . '</p>
                <hr>
                <a href="/Temps">Back to All Temps</a> | 
                <a href="/Temps/' . $Temp->id . '/edit">Edit Temp</a> |
                <form method="POST" action="/Temps/' . $Temp->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Temp $Temp)
    {
        return '<h1>Edit Temp: ' . $Temp->name . '</h1>
                <form method="POST" action="/Temps/' . $Temp->id . '">
                    <input type="hidden" name="_method" value="PUT">
                    <p>Name: <input type="text" name="name" value="' . $Temp->name . '" required></p>
                    <p>Email: <input type="email" name="email" value="' . $Temp->email . '" required></p>
                    <p>Major: <input type="text" name="major" value="' . $Temp->major . '" required></p>
                    <p>Year: 
                        <select name="year" required>
                            <option value="1"' . ($Temp->year == 1 ? ' selected' : '') . '>1st Year</option>
                            <option value="2"' . ($Temp->year == 2 ? ' selected' : '') . '>2nd Year</option>
                            <option value="3"' . ($Temp->year == 3 ? ' selected' : '') . '>3rd Year</option>
                            <option value="4"' . ($Temp->year == 4 ? ' selected' : '') . '>4th Year</option>
                        </select>
                    </p>
                    <p><button type="submit">Update Temp</button></p>
                </form>
                <a href="/Temps/' . $Temp->id . '">Cancel</a>';
    }


    public function update(Request $request, Temp $Temp)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:Temps,email,' . $Temp->id,
            'major' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:4'
        ]);

        $Temp->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Temp information updated successfully!</p>
                <p>Name: ' . $Temp->name . '</p>
                <p>Email: ' . $Temp->email . '</p>
                <p>Major: ' . $Temp->major . '</p>
                <p>Year: ' . $Temp->year . '</p>
                <a href="/Temps/' . $Temp->id . '">View Temp</a> |
                <a href="/Temps">All Temps</a>';
    }


    public function destroy(Temp $Temp)
    {
        $name = $Temp->name; // Store name before deletion
        $Temp->delete();
        
        return '<h1>Deleted!</h1>
                <p>Temp "' . $name . '" has been removed from the database</p>
                <a href="/Temps">View All Temps</a> | 
                <a href="/Temps/create">Add New Temp</a>';
    }



}
