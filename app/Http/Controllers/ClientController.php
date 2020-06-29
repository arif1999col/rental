<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 4;
        $data['no'] = 1;
        $data['title'] = "Clients";
        $data['clients'] = Client::all();
        return view('client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 4;
        $data['title'] = "Add Clients";
        return view('client.create', $data);
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
            'name' => 'required|string|max:150',
            'nik' => 'required|integer|unique:clients',
            'dob' => 'required',
            'phone' => 'required|max:15',
            'gender' => 'required',
        ]);

        if($validate) {
            $insert = Client::create($request->toArray());
            $request->session()->flash('success', 'Add client success!');
            return redirect()->route('client.index');
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
        $data['menu'] = 4;
        $data['no'] = 1;
        $data['title'] = "Edit Client";
        $data['client'] = Client::find($id);
        return view('client.edit', $data);
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
        $client = Client::find($id);
        //jika nik == yang di form. validasi unique email ilang
        if($client->nik == $request->nik){
            $validate = $request->validate([
                'name' => 'required|string|max:150',
                'dob' => 'required',
                'phone' => 'required|max:15',
                'gender' => 'required',
            ]);
        } else {
            $validate = $request->validate([
                'name' => 'required|string|max:150',
                'nik' => 'required|integer|unique:clients',
                'dob' => 'required',
                'phone' => 'required|max:15',
                'gender' => 'required',
            ]);
        }

        if($validate) {
            $insert = Client::find($id)->update($request->toArray());
            $request->session()->flash('success', 'Edit client success!');
            return redirect()->route('client.index');
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
        Client::destroy($id);
        return redirect()->route('client.index');
    }
}
