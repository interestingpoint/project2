<?php

namespace App\Http\Controllers;

use App\Models\Ticker;
use Illuminate\Http\Request;


class TickerController extends Controller
{

    public function index()
    {
        $Tickers = Ticker::all();
        
        $html = '<h1>All Tickers</h1>';
        $html .= '<a href="/Tickers/create">Add New Ticker</a>';
        $html .= '<hr>';
        
        if ($Tickers->count() > 0) {
            foreach ($Tickers as $Ticker) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Ticker->symbol . '</h3>';
                $html .= '<p>full_name: ' . $Ticker->full_name . '</p>';
                $html .= '<p>is_up: ' . $Ticker->is_up . '</p>';
                $html .= '<a href="/Tickers/' . $Ticker->id . '">View Details</a> | ';
                $html .= '<a href="/Tickers/' . $Ticker->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Tickers found. <a href="/Tickers/create">Add the first Ticker</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Ticker.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'symbol' => 'required|string|max:255',
            'full name' => 'required|string|max:255',
            'is_up' => 'required|integer'
        ]);

        $Ticker = Ticker::create($validated);
        
        return '<h1>Success!</h1>
                <p>Ticker created successfully!</p>
                <p>ID: ' . $Ticker->id . '</p>
                <p>symbol: ' . $Ticker->symbol . '</p>
                <p>full_name: ' . $Ticker->full_name . '</p>
                <p>is_up: ' . $Ticker->is_up . '</p>
                <a href="/Tickers">View All Tickers</a> | 
                <a href="/Tickers/create">Add Another</a>';
    }

    public function show(Ticker $Ticker)
    {
        
        return '<h1>Ticker Details</h1>
                <p><strong>ID:</strong> ' . $Ticker->id . '</p>
                <p><strong>symbol:</strong> ' . $Ticker->symbol . '</p>
                <p><strong>full_name:</strong> ' . $Ticker->full_name . '</p>
                <p><strong>is_up:</strong> ' . $Ticker->is_up . '</p>
                <p><strong>Created:</strong> ' . $Ticker->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Ticker->updated_at . '</p>
                <hr>
                <a href="/Tickers">Back to All Tickers</a> | 
                <a href="/Tickers/' . $Ticker->id . '/edit">Edit Ticker</a> |
                <form method="POST" action="/Tickers/' . $Ticker->id . '" style="display: inline;">
                    <input type="hidden" symbol="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Ticker $Ticker)
    {
        return view('Ticker.edit', compact(var_name: 'Ticker'));

    }


    public function update(Request $request, Ticker $Ticker)
    {
        $validated = $request->validate([
            'symbol' => 'required|string|max:255',
            'full name' => 'required|string|max:255',
            'is_up' => 'required|integer'
        ]);

        $Ticker->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Ticker information updated successfully!</p>
                <p>symbol: ' . $Ticker->symbol . '</p>
                <p>full_name: ' . $Ticker->full_name . '</p>
                <p>is_up: ' . $Ticker->is_up . '</p>
                <a href="/Tickers/' . $Ticker->id . '">View Ticker</a> |
                <a href="/Tickers">All Tickers</a>';
    }


    public function destroy(Ticker $Ticker)
    {
        $symbol = $Ticker->symbol; 
        $Ticker->delete();
        
        return '<h1>Deleted!</h1>
                <p>Ticker "' . $symbol . '" has been removed from the database</p>
                <a href="/Tickers">View All Tickers</a> | 
                <a href="/Tickers/create">Add New Ticker</a>';
    }



}
