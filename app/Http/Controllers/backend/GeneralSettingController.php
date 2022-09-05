<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GeneralSettingController extends Controller
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
        $generalsetting = GeneralSetting::where('id',1)->first();
        return view('backend.generalsetting',compact('generalsetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $slider = GeneralSetting::find($id);
        if ($request->hasFile('logo')){
            $validated = $request->validate([
                'facebook' => 'required',
                'youtube' => 'required',
                'logo' => 'mimes:png,jpg,jpeg'
            ]);
        }else{
            $validated = $request->validate([
                'facebook' => 'required',
                'youtube' => 'required',
            ]);
        }
        
        if ($validated) {
            if ($request->hasFile('logo')) {
                if (Storage::exists('public/uploads/slider'.$slider->logo)) {
                    Storage::delete('public/uploads/slider'.$slider->logo);
                }
                $file = $request->logo;
                $destination = 'public/uploads/generalsetting';
                $name = $file->getClientOriginalName();
                $file->storeAs($destination,$name);
                $slider->update([
                    'facebook' => $request->facebook,
                    'youtube' => $request->youtube,
                    'logo' => $name,
                ]);
                return redirect()->route('admin.general-setting.create');
            }else{
                $slider->update([
                    'facebook' => $request->facebook,
                    'youtube' => $request->youtube,
                ]);
                return redirect()->route('admin.general-setting.create');
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
