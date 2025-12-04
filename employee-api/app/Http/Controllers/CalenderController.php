<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use Illuminate\Http\Request;


class CalenderController extends Controller
{

    public function index()
    {
        $Calenders = Calender::all();
        
        $html = '<h1>All Calenders</h1>';
        $html .= '<a href="/Calenders/create">Add New Calender</a>';
        $html .= '<hr>';
        
        if ($Calenders->count() > 0) {
            foreach ($Calenders as $Calender) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Calender->date . '</h3>';
                $html .= '<p>date: ' . $Calender->time . '</p>';
                $html .= '<p>time: ' . $Calender->event . '</p>';
                $html .= '<a href="/Calenders/' . $Calender->id . '">View Details</a> | ';
                $html .= '<a href="/Calenders/' . $Calender->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Calenders found. <a href="/Calenders/create">Add the first Calender</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Calender.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'event' => 'required|string|max:255'
        ]);

        $Calender = Calender::create($validated);
        
        return '<h1>Success!</h1>
                <p>Calender created successfully!</p>
                <p>ID: ' . $Calender->id . '</p>
                <p>Name: ' . $Calender->date . '</p>
                <p>Email: ' . $Calender->time . '</p>
                <p>Major: ' . $Calender->event . '</p>
                <a href="/Calenders">View All Calenders</a> | 
                <a href="/Calenders/create">Add Another</a>';
    }

    public function show(Calender $Calender)
    {
        
        return '<h1>Calender Details</h1>
                <p><strong>ID:</strong> ' . $Calender->id . '</p>
                <p><strong>Name:</strong> ' . $Calender->date . '</p>
                <p><strong>Email:</strong> ' . $Calender->time . '</p>
                <p><strong>Major:</strong> ' . $Calender->event . '</p>
                <p><strong>Created:</strong> ' . $Calender->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Calender->updated_at . '</p>
                <hr>
                <a href="/Calenders">Back to All Calenders</a> | 
                <a href="/Calenders/' . $Calender->id . '/edit">Edit Calender</a> |
                <form method="POST" action="/Calenders/' . $Calender->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Calender $Calender)
    {
        return view('Calender.edit', compact(var_name: 'Calender'));

    }


    public function update(Request $request, Calender $Calender)
    {
        $validated = $request->validate([
            'date' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'event' => 'required|string|max:255'
        ]);

        $Calender->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Calender information updated successfully!</p>
                <p>date: ' . $Calender->date . '</p>
                <p>time: ' . $Calender->time . '</p>
                <p>event: ' . $Calender->event . '</p>
                <a href="/Calenders/' . $Calender->id . '">View Calender</a> |
                <a href="/Calenders">All Calenders</a>';
    }


    public function destroy(Calender $Calender)
    {
        $name = $Calender->name; 
        $Calender->delete();
        
        return '<h1>Deleted!</h1>
                <p>Calender "' . $name . '" has been removed from the database</p>
                <a href="/Calenders">View All Calenders</a> | 
                <a href="/Calenders/create">Add New Calender</a>';
    }



}
