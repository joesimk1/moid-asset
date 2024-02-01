<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::all();

        return view('departments.index')->with([
            'departments'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>"required",
            'inst_id'=>"required",
            'description'=>"required",

        ];

        $this->validate($request,$rules);
        // retrieve data from the request
        $data = $request->all();

        Department::create($data);



        // push a message of notification
        session()->flash('success-status',"Created a department");

        // return  to the departments page
        return redirect()->to('departments');
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
    {
        return view('departments.show')->with([
            'department'=>$department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        return view("departments.edit")->with([
            'department'=>$department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department $department)
    {
        $updates = $request->all();

        $department->update($updates);

        session()->flash('success-status',"Update successful");

        return redirect()->to("departments");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department $department)
    {
        $department->delete();
        session()->flash('success-status',"Department successfully deleted");

        return back();
    }
}
