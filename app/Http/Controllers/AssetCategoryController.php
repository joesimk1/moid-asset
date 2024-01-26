<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Models\AssetCategory;


class AssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AssetCategory::all();

        return view('assetcategories.index')->with([
            'assetcategories'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assetcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>"required",
            'code'=>"required",
            'description'=>"required",

        ];

        $this->validate($request,$rules);
        // retrieve data from the request
        $data = $request->all();

        AssetCategory::create($data);



        // push a message of notification
        session()->flash('success-status',"Created an assetcategory");

        // return  to the institution page
        return redirect()->to('assetcategories');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetCategory $assetcategory)
    {
        return view('assetcategories.show')->with([
            'assetcategories'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
