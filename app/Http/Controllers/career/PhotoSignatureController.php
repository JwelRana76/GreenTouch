<?php

namespace App\Http\Controllers\career;

use Illuminate\Http\Request;
use App\Models\UserPersonalDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PhotoSignatureController extends Controller
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
            'picture' => 'required',
            'signature' => 'required'
        ]);
        if ($validated) {
            
            if ($request->file('picture')) {
                if (Storage::exists('public/uploads/career/'.Auth::user()->personaldetails->picture)) {
                    Storage::delete('public/uploads/slider/'.Auth::user()->personaldetails->picture);
                }
            }
            if ($request->file('signature')) {
                if (Storage::exists('public/uploads/career/'.Auth::user()->personaldetails->signature)) {
                    Storage::delete('public/uploads/slider/'.Auth::user()->personaldetails->signature);
                }
            }
            $pic = $request->picture;
            $sig = $request->signature;
            $destination = "public/uploads/career";
            $pname = time().'.'.$pic->getClientOriginalextension();
            $sname = time().'.'.$sig->getClientOriginalextension();
            $pic->storeAs($destination,$pname);
            $sig->storeAs($destination,$sname);

            $user_info = UserPersonalDetails::where('user_id',$id);
            $user_info->update([
                'picture' => $pname,
                'signature' => $sname,
            ]);
            return redirect()->route('career');
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
