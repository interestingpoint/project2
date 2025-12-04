<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;


class HomeworkController extends Controller
{

    public function index()
    {
        $Homeworks = Homework::all();
        
        $html = '<h1>All Homeworks</h1>';
        $html .= '<a href="/Homeworks/create">Add New Homework</a>';
        $html .= '<hr>';
        
        if ($Homeworks->count() > 0) {
            foreach ($Homeworks as $Homework) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Homework->name . '</h3>';
                $html .= '<p>questions: ' . $Homework->questions . '</p>';
                $html .= '<p>class: ' . $Homework->class . '</p>';
                $html .= '<a href="/Homeworks/' . $Homework->id . '">View Details</a> | ';
                $html .= '<a href="/Homeworks/' . $Homework->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Homeworks found. <a href="/Homeworks/create">Add the first Homework</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Homework.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'questions' => 'required|integer',
            'class' => 'required|string|max:255'
        ]);

        $Homework = Homework::create($validated);
        
        return '<h1>Success!</h1>
                <p>Homework created successfully!</p>
                <p>ID: ' . $Homework->id . '</p>
                <p>Name: ' . $Homework->name . '</p>
                <p>questions: ' . $Homework->questions . '</p>
                <p>class: ' . $Homework->class . '</p>
                <a href="/Homeworks">View All Homeworks</a> | 
                <a href="/Homeworks/create">Add Another</a>';
    }

    public function show(Homework $Homework)
    {
        
        return '<h1>Homework Details</h1>
                <p><strong>ID:</strong> ' . $Homework->id . '</p>
                <p><strong>Name:</strong> ' . $Homework->name . '</p>
                <p><strong>questions:</strong> ' . $Homework->questions . '</p>
                <p><strong>class:</strong> ' . $Homework->class . '</p>
                <p><strong>Created:</strong> ' . $Homework->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Homework->updated_at . '</p>
                <hr>
                <a href="/Homeworks">Back to All Homeworks</a> | 
                <a href="/Homeworks/' . $Homework->id . '/edit">Edit Homework</a> |
                <form method="POST" action="/Homeworks/' . $Homework->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Homework $Homework)
    {
        return view('Homework.edit', compact(var_name: 'Homework'));

    }


    public function update(Request $request, Homework $Homework)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'questions' => 'required|integer',
            'class' => 'required|string|max:255'
        ]);

        $Homework->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Homework information updated successfully!</p>
                <p>Name: ' . $Homework->name . '</p>
                <p>questions: ' . $Homework->questions . '</p>
                <p>class: ' . $Homework->class . '</p>
                <a href="/Homeworks/' . $Homework->id . '">View Homework</a> |
                <a href="/Homeworks">All Homeworks</a>';
    }


    public function destroy(Homework $Homework)
    {
        $name = $Homework->name; 
        $Homework->delete();
        
        return '<h1>Deleted!</h1>
                <p>Homework "' . $name . '" has been removed from the database</p>
                <a href="/Homeworks">View All Homeworks</a> | 
                <a href="/Homeworks/create">Add New Homework</a>';
    }



}
