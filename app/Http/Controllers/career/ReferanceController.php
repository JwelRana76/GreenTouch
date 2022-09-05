<?php

namespace App\Http\Controllers\career;

use Illuminate\Http\Request;
use App\Models\UserReferances;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReferanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('web')->user()->id;
        $referance = UserReferances::where('user_id',$id)->get();
        return response()->json(['referance'=>$referance]);
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
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'name'=>'required',
            'institute_name'=>'required',
            'address'=>'required',
            'relation'=>'required',
            'contact'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->messages(),]);
        }else {
            UserReferances::create([
                'user_id' =>$request->input('user_id'),
                'name' =>$request->input('name'),
                'institute_name' =>$request->input('institute_name'),
                'address' =>$request->input('address'),
                'contact' =>$request->input('contact'),
                'relation' =>$request->input('relation')
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
        
    }

    public function referanceConform(Request $request)
    {
        $id = Auth::guard('web')->user()->id;
        $referance = UserReferances::where('user_id',$id)->get();
        foreach ($referance as $value) {
            $value->update([
                'status' => 'conform',
            ]);
        }
        return redirect()->route('career.PhotoSignature');
    }

    public function deleteRefer($id)
    {
        $referance = UserReferances::find($id);
        if ($referance) {
            $referance->delete();
            return response()->json(['success'=>'Delete Success']);
        }else{
            return response()->json(['error'=>'Id Not Found']);
        }
    }
}
