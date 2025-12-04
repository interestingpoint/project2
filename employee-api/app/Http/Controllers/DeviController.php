<?php

namespace App\Http\Controllers;

use App\Models\Devi;
use Illuminate\Http\Request;


class DeviController extends Controller
{

    public function index()
    {
        $Devis = Devi::all();
        
        $html = '<h1>All Devis</h1>';
        $html .= '<a href="/Devis/create">Add New Devi</a>';
        $html .= '<hr>';
        
        if ($Devis->count() > 0) {
            foreach ($Devis as $Devi) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Devi->type . '</h3>';
                $html .= '<p>desc: ' . $Devi->desc . '</p>';
                $html .= '<p>status: ' . $Devi->status . '</p>';
                $html .= '<a href="/Devis/' . $Devi->id . '">View Details</a> | ';
                $html .= '<a href="/Devis/' . $Devi->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Devis found. <a href="/Devis/create">Add the first Devi</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Devi.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'status' => 'required|integer'
        ]);

        $Devi = Devi::create($validated);
        
        return '<h1>Success!</h1>
                <p>Devi created successfully!</p>
                <p>ID: ' . $Devi->id . '</p>
                <p>type: ' . $Devi->type . '</p>
                <p>desc: ' . $Devi->desc . '</p>
                <p>status: ' . $Devi->status . '</p>
                <p>Year: ' . $Devi->year . '</p>
                <a href="/Devis">View All Devis</a> | 
                <a href="/Devis/create">Add Another</a>';
    }

    public function show(Devi $Devi)
    {
        
        return '<h1>Devi Details</h1>
                <p><strong>ID:</strong> ' . $Devi->id . '</p>
                <p><strong>type:</strong> ' . $Devi->type . '</p>
                <p><strong>desc:</strong> ' . $Devi->desc . '</p>
                <p><strong>status:</strong> ' . $Devi->status . '</p>
                <p><strong>Created:</strong> ' . $Devi->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Devi->updated_at . '</p>
                <hr>
                <a href="/Devis">Back to All Devis</a> | 
                <a href="/Devis/' . $Devi->id . '/edit">Edit Devi</a> |
                <form method="POST" action="/Devis/' . $Devi->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Devi $Devi)
    {
        return view('Devi.edit', compact(var_name: 'Devi'));

    }


    public function update(Request $request, Devi $Devi)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'status' => 'required|integer'
        ]);

        $Devi->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Devi information updated successfully!</p>
                <p>type: ' . $Devi->type . '</p>
                <p>desc: ' . $Devi->desc . '</p>
                <p>status: ' . $Devi->status . '</p>
                <a href="/Devis/' . $Devi->id . '">
                View Devi</a> |
                <a href="/Devis">All Devis</a>';
    }


    public function destroy(Devi $Devi)
    {
        $name = $Devi->name; 
        $Devi->delete();
        
        return '<h1>Deleted!</h1>
                <p>Devi "' . $name . '" has been removed from the database</p>
                <a href="/Devis">View All Devis</a> | 
                <a href="/Devis/create">Add New Devi</a>';
    }



}
