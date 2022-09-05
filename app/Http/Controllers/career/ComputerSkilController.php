<?php

namespace App\Http\Controllers\career;

use Illuminate\Http\Request;
use App\Models\UserPersonalDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComputerSkilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'career_objective' => 'required',
            'computer_skill' => 'required'
        ]);
        if ($validated) {
            $user_info = UserPersonalDetails::where('user_id',$id);
            $user_info->update([
                'career_objective' => $request->career_objective,
                'computer_skill' => $request->computer_skill,
            ]);
            return redirect()->route('career.Referance');
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
}
