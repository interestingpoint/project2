<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;


class GradesController extends Controller
{

    public function index()
    {
        $Gradess = Grades::all();
        
        $html = '<h1>All Gradess</h1>';
        $html .= '<a href="/Gradess/create">Add New Grades</a>';
        $html .= '<hr>';
        
        if ($Gradess->count() > 0) {
            foreach ($Gradess as $Grades) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Grades->name . '</h3>';
                $html .= '<p>grade: ' . $Grades->english_grade . '</p>';
                $html .= '<p>grade: ' . $Grades->ss_grade . '</p>';
                $html .= '<p>grade: ' . $Grades->math_grade . '</p>';
                $html .= '<a href="/Gradess/' . $Grades->id . '">View Details</a> | ';
                $html .= '<a href="/Gradess/' . $Grades->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Gradess found. <a href="/Gradess/create">Add the first Grades</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Grades.create');

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
        
        return '<h1>Success!</h1>
                <p>Grades created successfully!</p>
                <p>ID: ' . $Grades->id . '</p>
                <p>grade: ' . $Grades->english_grade . '</p>
                <p>grade: ' . $Grades->ss_grade . '</p>
                <p>grade: ' . $Grades->math_grade . '</p>
                <a href="/Gradess">View All Gradess</a> | 
                <a href="/Gradess/create">Add Another</a>';
    }

    public function show(Grades $Grades)
    {
        
        return '<h1>Grades Details</h1>
                <p>ID: ' . $Grades->id . '</p>
                <p>grade: ' . $Grades->english_grade . '</p>
                <p>grade: ' . $Grades->ss_grade . '</p>
                <p>grade: ' . $Grades->math_grade . '</p>
                <p><strong>Created:</strong> ' . $Grades->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Grades->updated_at . '</p>
                <hr>
                <a href="/Gradess">Back to All Gradess</a> | 
                <a href="/Gradess/' . $Grades->id . '/edit">Edit Grades</a> |
                <form method="POST" action="/Gradess/' . $Grades->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Grades $Grades)
    {
        return view('Grades.edit', compact(var_name: 'Grades'));

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
        
        return '<h1>Updated!</h1>
                <p>Grades information updated successfully!</p>
                <p>Name: ' . $Grades->name . '</p>
                <p>grade: ' . $Grades->english_grade . '</p>
                <p>grade: ' . $Grades->math_grade . '</p>
                <p>grade: ' . $Grades->ss_grade . '</p>
                <a href="/Gradess/' . $Grades->id . '">View Grades</a> |
                <a href="/Gradess">All Gradess</a>';
    }


    public function destroy(Grades $Grades)
    {
        $name = $Grades->name; 
        $Grades->delete();
        
        return '<h1>Deleted!</h1>
                <p>Grades "' . $name . '" has been removed from the database</p>
                <a href="/Gradess">View All Gradess</a> | 
                <a href="/Gradess/create">Add New Grades</a>';
    }



}
