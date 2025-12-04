<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{

    public function index()
    {
        $Employee = Employee::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Employee retrieved successfully',
            'data' => $Employee,
            'total' => $Employee->count()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tenure' => 'required|integer',
            'department' => 'required|string|max:255'
        ]);

        $Employee = Employee::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Employee created successfully',
            'data' => $Employee
        ], 201); 
    }


    public function show(Employee $Employee)
    {
        return response()->json([
            'success' => true,
            'message' => 'Employee retrieved successfully',
            'data' => $Employee
        ]);
    }


    public function update(Request $request, Employee $Employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tenure' => 'required|integer',
            'department' => 'required|string|max:255'
        ]);

        $Employee->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Employee updated successfully',
            'data' => $Employee->fresh() 
        ]);
    }


    public function destroy(Employee $Employee)
    {
        $Employee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Employee deleted successfully'
        ]);
    }
    
}
