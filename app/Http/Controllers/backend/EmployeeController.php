<?php

namespace App\Http\Controllers\backend;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EmployeeFormRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $input = $request->validated();
        if ($request->hasFile('photo')) {
            $destination = 'public/uploads/employee';
            $photo = $request->photo;
            $name = time().$photo->getClientOriginalExtension();
            $photo->storeAs($destination,$name);
            $input['photo'] = $name;
        }
        $input['facebook']=$request->facebook;
        Employee::create($input);
        return redirect()->route('admin.employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if (Storage::exists('public/uploads/employee'.$employee->image)) {
            Storage::delete('public/uploads/employee'.$employee->image);
        }
        $employee->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('backend.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->validated();
        if (Storage::exists('public/uploads/employee'.$employee->image)) {
            Storage::delete('public/uploads/employee'.$employee->image);
        }
        if ($request->hasFile('photo')) {
            $destination = 'public/uploads/employee';
            $photo = $request->photo;
            $name = time().$photo->getClientOriginalExtension();
            $photo->storeAs($destination,$name);
            $input['photo'] = $name;
        }
        $input['facebook']=$request->facebook;
        $employee->update($input);
        return redirect()->route('admin.employee.index');
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
