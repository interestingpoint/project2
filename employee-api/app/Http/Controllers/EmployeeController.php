<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{

    public function index()
    {
        $Employees = Employee::all();
        
        $html = '<h1>All Employees</h1>';
        $html .= '<a href="/Employees/create">Add New Employee</a>';
        $html .= '<hr>';
        
        if ($Employees->count() > 0) {
            foreach ($Employees as $Employee) {
                $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
                $html .= '<h3>' . $Employee->name . '</h3>';
                $html .= '<p>tenure: ' . $Employee->tenure . '</p>';
                $html .= '<p>department: ' . $Employee->department . '</p>';
                $html .= '<p>Year: ' . $Employee->year . '</p>';
                $html .= '<a href="/Employees/' . $Employee->id . '">View Details</a> | ';
                $html .= '<a href="/Employees/' . $Employee->id . '/edit">Edit</a>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No Employees found. <a href="/Employees/create">Add the first Employee</a></p>';
        }
        
        return $html;
    }


    public function create()
    {
        return view('Employee.create');

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tenure' => 'required|integer',
            'department' => 'required|string|max:255'
        ]);

        $Employee = Employee::create($validated);
        
        return '<h1>Success!</h1>
                <p>Employee created successfully!</p>
                <p>ID: ' . $Employee->id . '</p>
                <p>Name: ' . $Employee->name . '</p>
                <p>tenure: ' . $Employee->tenure . '</p>
                <p>dept: ' . $Employee->department . '</p>
                <a href="/Employees">View All Employees</a> | 
                <a href="/Employees/create">Add Another</a>';
    }

    public function show(Employee $Employee)
    {
        
        return '<h1>Employee Details</h1>
                <p><strong>ID:</strong> ' . $Employee->id . '</p>
                <p><strong>Name:</strong> ' . $Employee->name . '</p>
                <p><strong>ten:</strong> ' . $Employee->tenure . '</p>
                <p><strong>dept:</strong> ' . $Employee->department . '</p>
                <p><strong>Created:</strong> ' . $Employee->created_at . '</p>
                <p><strong>Updated:</strong> ' . $Employee->updated_at . '</p>
                <hr>
                <a href="/Employees">Back to All Employees</a> | 
                <a href="/Employees/' . $Employee->id . '/edit">Edit Employee</a> |
                <form method="POST" action="/Employees/' . $Employee->id . '" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
    }


    public function edit(Employee $Employee)
    {
        return view('Employee.edit', compact(var_name: 'Employee'));

    }


    public function update(Request $request, Employee $Employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tenure' => 'required|integer',
            'department' => 'required|string|max:255'
        ]);

        $Employee->update($validated);
        
        return '<h1>Updated!</h1>
                <p>Employee information updated successfully!</p>
                <p>Name: ' . $Employee->name . '</p>
                <p>Email: ' . $Employee->tenure . '</p>
                <p>Major: ' . $Employee->department . '</p>
                <a href="/Employees/' . $Employee->id . '">View Employee</a> |
                <a href="/Employees">All Employees</a>';
    }


    public function destroy(Employee $Employee)
    {
        $name = $Employee->name; 
        $Employee->delete();
        
        return '<h1>Deleted!</h1>
                <p>Employee "' . $name . '" has been removed from the database</p>
                <a href="/Employees">View All Employees</a> | 
                <a href="/Employees/create">Add New Employee</a>';
    }



}
