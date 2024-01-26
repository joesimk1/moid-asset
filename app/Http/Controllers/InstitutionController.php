<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Models\Institution;

class InstitutionController extends Controller
{
    public function index(){
        $data = Institution::all();

        return view('institutions.index')->with([
            'institutions'=>$data
        ]);
    }

    public function show(Institution $institution){
        return view('institutions.show')->with([
            'institution'=>$institution
        ]);
    }

    public function create(){
        return view('institutions.create');
    }

    public function store(Request $request){
        $rules = [
            'name'=>"required",
            'email'=>"required|email",
            'phone'=>"required|numeric",
            'description'=>"required",
            'address'=>"required",
            'location'=>"required",
        ];

        $this->validate($request,$rules);
        // retrieve data from the request
        $data = $request->all();

        Institution::create($data);



        // push a message of notification
        session()->flash('success-status',"Created an institution");

        // return  to the institution page
        return redirect()->to('institutions');
    }

    public function edit(Institution $institution){
        return view("institutions.edit")->with([
            'institution'=>$institution
        ]);
    }


    public function update(Request $request,Institution $institution){
        $updates = $request->all();

        $institution->update($updates);

        session()->flash('success-status',"Update successful");

        return redirect()->to("institutions");

    }

    public function destroy(Institution $institution){
        // delete the model
        $institution->delete();
        session()->flash('success-status',"Institution successfully deleted");

        return back();
    }
}

