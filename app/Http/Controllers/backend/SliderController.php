<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('backend.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $input = $request->all();
        if ($validated) {
            $file = $request->image;
            $destination = 'public/uploads/slider';
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs($destination,$name);
            $input['image']= $name;
            Slider::create($input);
            return redirect()->route('admin.slider.index');
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
        $slider = Slider::find($id);
        if (Storage::exists('public/uploads/slider/'.$slider->image)) {
            Storage::delete('public/uploads/slider/'.$slider->image);
        }
        $slider->delete();
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
        $slider = Slider::find($id);
        return view('backend.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);
        if ($request->hasFile('image')){
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'mimes:png,jpg,jpeg'
            ]);
        }else{
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
        }
        
        if ($validated) {
            if ($request->hasFile('image')) {
                if (Storage::exists('public/uploads/slider/'.$slider->image)) {
                    Storage::delete('public/uploads/slider/'.$slider->image);
                }
                $file = $request->image;
                $destination = 'public/uploads/slider';
                $name = time().'.'.$file->getClientOriginalextension();
                $file->storeAs($destination,$name);
                $slider->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $name,
                ]);
                return redirect()->route('admin.slider.index');
            }else{
                $slider->update([
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
                return redirect()->route('admin.slider.index');
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
        
    }
}
