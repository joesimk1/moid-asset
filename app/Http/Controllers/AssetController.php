<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Models\Asset;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = asset::all();
        return view("assets.index")->with(['assets'=>$data
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('institution_id', \request()->user()->institution_id)->get();
        return view("assets.create")->with([
            'department_id' => \request()->user()->department_id,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>"required",
            'depreciation_method'=>"required",
            'useful_life'=>"required",
            'department_id'=>"required",
            'asset_category'=>"required",
            'user_id'=>"required",
            'acq_date'=>"required",
            'description'=>"required",
        ];

        $this->validate($request,$rules);

        $data = $request->all();

        Asset::create($data);



        // push a message of notification
        session()->flash('success-status',"Created an asset");


        // return  to the institution page
       return redirect()->to('assets');
    }

    /**
     * Display the specified resource.
     */
   public function show( asset $asset)
   {

       return view("assets.show")->with([
           'asset'=>$asset
        ]);

   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, asset $asset)
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
