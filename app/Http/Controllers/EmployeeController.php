<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $data['title'] = "Employee";
        $data['menu'] = 3;
        $data['employees'] = Employee::all();
        $data['no'] = 1;
        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add Data Employee";
        $data['menu'] = 3;
        return view('employee.create', $data);
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
            'email' => 'required|string|max:150|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validate) {
            $input = [];
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['password'] = bcrypt($request->password);
            $insert = Employee::create($input);
            if($insert) {
                $request->session()->flash('success', 'Add employee success!');
                return redirect()->route('employee.index');
            } else {
                $request->session()->flash('danger', 'Add employee failed!');
                return redirect()->route('employee.index');
            }
        }
        
            
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit Data Employee";
        $data['menu'] = 3;
        $data['employee'] = Employee::find($id);
        return view('employee.edit', $data);
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
            'name' => 'required|string|max:150',
            
        ]);
        $employee = Employee::find($id);

        if($request->email == $employee->email){
            $update = Employee::find($id)->update([
                'name' =>  $request['name'], 
            ]); 
            $request->session()->flash('success', 'Edit user success!');
            return redirect()->route('employee.index');
        } else {
            $update = Employee::find($id)->update($request->toArray());
            if($update) {
                $request->session()->flash('success', 'Edit user success!');
                return redirect()->route('employee.index');
            } else {
                $request->session()->flash('danger', 'Edit user failed!');
                return redirect()->route('employee.index');
            }
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
        //
    }
}
