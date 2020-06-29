<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Brand;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Cars";
        $data['menu'] = 1;
        $cars = DB::table('cars')
                        ->join('brands', 'cars.brand_id', '=', 'brands.brand_id')
                        ->get()->toArray();
        //ngereturn array dari query builder laravel
        $data['cars'] = json_decode(json_encode($cars), true);
        //catatan : besok2 pake notasi objek aja kalo nampilin data dari eloqeunt or dari db
        $data['no'] = 1;
        return view('car.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add New Cars";
        $data['menu'] = 1;
        $data['brands'] = Brand::all();
        
        return view('car.create', $data);
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
            'car_name' => 'required',
            'year' => 'required|numeric',
            'license_plat' => 'required|max:10',
            'price' => 'required|numeric',
            'type' => 'required',
            'brand_id' => 'required'
        ]);

        $insert = Car::create($request->toArray());

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit Cars";
        $data['menu'] = 1;
        $data['car'] = Car::find($id);
        $data['brands'] = Brand::all();
        
        return view('car.edit', $data);
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
            'car_name' => 'required',
            'year' => 'required|numeric',
            'license_plat' => 'required|max:10',
            'price' => 'required|numeric',
            'type' => 'required',
            'brand_id' => 'required'
        ]);

        $update = Car::find($id)->update($request->toArray());
        return redirect()->route('car.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect()->route('car.index');
    }
}
