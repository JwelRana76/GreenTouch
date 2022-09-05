<?php

namespace App\Http\Controllers\career;

use Illuminate\Http\Request;
use App\Models\UserPersonalDetails;
use App\Http\Controllers\Controller;
use App\Models\EducationalInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('web')->user()->id;
        $educationinfo = EducationalInfo::where('user_id',$id)->get();
        return response()->json(['educationinfo' => $educationinfo]);
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
        $id = Auth::guard('web')->user()->id;
        $validator = Validator::make($request->all(),[
            'label'=>'required',
            'degree'=>'required',
            'group'=>'required',
            'cgpa'=>'required',
            'scale'=>'required',
            'passing_year'=>'required',
            'board'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->messages(),]);
        }else {
            EducationalInfo::create([
                'user_id' =>$id,
                'label' =>$request->input('label'),
                'degree' =>$request->input('degree'),
                'group' =>$request->input('group'),
                'cgpa' =>$request->input('cgpa'),
                'scale' =>$request->input('scale'),
                'passing_year' =>$request->input('passing_year'),
                'board' =>$request->input('board'),
            ]);
            return response()->json(['success'=>'Referances Added',]);
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

    public function educationinfoedelete($id)
    {
        $find = EducationalInfo::find($id);
        if ($find) {
            $find->delete();
            return response()->json(['success'=>'Delete Success']);
        }else{
            return response()->json(['error'=>'Id Not Found']);
        }
    }

    public function educationinfoConform()
    {
        $id = Auth::guard('web')->user()->id;
        $find = EducationalInfo::where('user_id',$id)->get();
        foreach ($find as $value) {
            $value->update([
                'status' => 'conform',
            ]);
        }
        return redirect()->route('career.EmploymentInfo');
    }
}
