<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = user::all();
        return view("users.index")->with(['users'=>$data
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'fname'=>"required|string",
            'sname'=>"required|string",
            'password'=>"required|string",
            'email'=>"required|string|unique:users,email",
            'role'=>"required|string",

        ];

        $this->validate($request,$rules);
        $data = $request->all();
// hash the password

        $data['password'] = bcrypt($data['password']);

        //save the user

        User::create($data);

        //set success message

        // set a success message
        session()->flash('success-status',"User created successfully!");

        return redirect()->route("users.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
