<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view("users.index")->with(['users' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = [];

        // If the user is an institution admin, they may need the departments,
        // so load them up
        if (auth()->user()->role === "instadmin") {
            $departments = Department::where('institution_id', auth()->user()->institution_id)->get();
        }

        return view("users.create")->with([
            'institutions' => Institution::all(),
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => "required|string",
            'sname' => "required|string",
            'password' => "required|string",
            'email' => "required|email|unique:users,email",
            'role' => "required|string|max:255", // Adjust the max length as needed
            'institution_id' => "required_if:role,instadmin",
            'department_id' => "required_if:role,deptadmin",
        ]);

        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Save the user
        try {
            User::create($validatedData);
        } catch (\Exception $e) {
            // Handle any exception, such as the data truncation error
            // Log or return an error message
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the user.']);
        }

        // Set a success message
        session()->flash('success-status', "User created successfully!");

        return redirect()->route("users.index");
    }

    // Other methods remain unchanged
}
