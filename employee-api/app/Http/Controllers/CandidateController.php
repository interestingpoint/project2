<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;


class CandidateController extends Controller
{

    public function index()
    {
        $Candidates = Candidate::all();
        
        $html = '<h1>All Candidates</h1>';
        $html .= '<a href="/Candidates/create">Add New Candidate</a>';
        $html .= '<hr>';
        
        if ($Candidates->count() > 0) {
            foreach ($Candidates as $Candidate) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Candidate->name . '</h3>';
                $html .= '<p>votes: ' . $Candidate->votes . '</p>';
                $html .= '<p>position: ' . $Candidate->position . '</p>';
                $html .= '<a href="/Candidates/' . $Candidate->id . '">View Details</a> | ';
                $html .= '<a href="/Candidates/' . $Candidate->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Candidates found. <a href="/Candidates/create">Add the first Candidate</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Candidate.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'votes' => 'required|integer',
            'position' => 'required|string|max:255'
        ]);

        $Candidate = Candidate::create($validated);
        
        return '<h1>Success!</h1>
                <p>Candidate created successfully!</p>
                <p>ID: ' . $Candidate->id . '</p>
                <p>Name: ' . $Candidate->name . '</p>
                <p>votes: ' . $Candidate->votes . '</p>
                <p>position: ' . $Candidate->position . '</p>
                <a href="/Candidates">View All Candidates</a> | 
                <a href="/Candidates/create">Add Another</a>';
    }

    public function show(Candidate $Candidate)
    {
        
        return '<h1>Candidate Details</h1>
                <p><strong>ID:</strong> ' . $Candidate->id . '</p>
                <p><strong>Name:</strong> ' . $Candidate->name . '</p>
                <p><strong>votes:</strong> ' . $Candidate->votes . '</p>
                <p><strong>position:</strong> ' . $Candidate->position . '</p>
                <p><strong>Created:</strong> ' . $Candidate->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Candidate->updated_at . '</p>
                <hr>
                <a href="/Candidates">Back to All Candidates</a> | 
                <a href="/Candidates/' . $Candidate->id . '/edit">Edit Candidate</a> |
                <form method="POST" action="/Candidates/' . $Candidate->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Candidate $Candidate)
    {
        return view('Candidate.edit', compact(var_name: 'Candidate'));

    }


    public function update(Request $request, Candidate $Candidate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'votes' => 'required|integer',
            'position' => 'required|string|max:255'
        ]);

        $Candidate->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Candidate information updated successfully!</p>
                <p>Name: ' . $Candidate->name . '</p>
                <p>votes: ' . $Candidate->votes . '</p>
                <p>position: ' . $Candidate->poistion . '</p>
                <a href="/Candidates/' . $Candidate->id . '">View Candidate</a> |
                <a href="/Candidates">All Candidates</a>';
    }


    public function destroy(Candidate $Candidate)
    {
        $name = $Candidate->name; 
        $Candidate->delete();
        
        return '<h1>Deleted!</h1>
                <p>Candidate "' . $name . '" has been removed from the database</p>
                <a href="/Candidates">View All Candidates</a> | 
                <a href="/Candidates/create">Add New Candidate</a>';
    }



}
