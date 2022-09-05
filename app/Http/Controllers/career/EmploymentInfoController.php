<?php

namespace App\Http\Controllers\career;

use Illuminate\Http\Request;
use App\Models\EmploymentInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmploymentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('web')->user()->id;
        $employmentinfo = EmploymentInfo::where('user_id',$id)->get();
        return response()->json(['employmentinfo' => $employmentinfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json(['error'=>'error']);
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'company_name'=>'required',
            'position'=>'required',
            'department'=>'required',
            'from_date'=>'required',
            'to_date'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->messages(),]);
        }else {
            EmploymentInfo::create([
                'user_id' =>$request->input('user_id'),
                'company_name' =>$request->input('company_name'),
                'position' =>$request->input('position'),
                'department' =>$request->input('department'),
                'from_date' =>$request->input('from_date'),
                'to_date' =>$request->input('to_date')
            ]);
            return response()->json(['success'=>'Employment Added',]);
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
        //
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
        //
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


    public function employment_infoDelete($id)
    {
        $find = EmploymentInfo::find($id);
        if ($find) {
            $find->delete();
            return response()->json(['success'=>'Delete Success']);
        }else{
            return response()->json(['error'=>'Id Not Found']);
        }
    }
    public function employment_infoConform()
    {
        $id = Auth::guard('web')->user()->id;
        $find = EmploymentInfo::where('user_id',$id)->get();
        foreach ($find as $value) {
            $value->update([
                'status' => 'conform',
            ]);
        }
        return redirect()->route('career.ComputerSkill');
    }
}
