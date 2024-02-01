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
            'assetcategory'=>$assetcategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(assetcategory $assetcategory)
    {
        return view("assetcategories.edit")->with([
            'assetcategory'=>$assetcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, assetcategory $assetcategory)
    {
        $updates = $request->all();

        $assetcategory->update($updates);

        session()->flash('success-status',"Update successful");

        return redirect()->to("assetcategories");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assetcategory $assetcategory)
    {
        $assetcategory->delete();
        session()->flash('success-status',"Category successfully deleted");

        return back();
    }
}
