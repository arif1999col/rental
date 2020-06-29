<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 2;
        $data['title'] = "Brand Car";
        $data['brands'] = Brand::all();
        $data['no'] = 1;
        return view('brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 2;
        $data['title'] = "Add Car Brands";
        return view('brand.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'brand_name' => 'required'
        ]);

        $insert = Brand::create($request->toArray());
        if($insert == true ){
            $request->session()->flash('success', 'Add brand success!');
            return redirect()->route('brand.index');
        } else {
            $request->session()->flash('danger', 'Add brand failed!');
            return redirect()->route('brand.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 2;
        $data['title'] = "Edit Car Brands";
        $data['brand'] = Brand::find($id);
        return view('brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'brand_name' => 'required|max:30',
        ]);

        $update = Brand::find($id)->update($request->toArray());
        if($update) {
            $request->session()->flash('success', 'Add brand success!');
            return redirect()->route('brand.index');
        } else {
            $request->session()->flash('danger', 'Add brand failed!');
            return redirect()->route('brand.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Brand::destroy($id);
        return redirect()->route('brand.index');
    }
}
