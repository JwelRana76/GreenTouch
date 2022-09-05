<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Circular;
use Illuminate\Http\Request;
use Svg\Tag\Circle;

class circularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circulars = Circular::orderBy('id','DESC')->get();
        return view('backend.job.circular.index',compact('circulars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.job.circular.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validated = $request->validate([
            'post' => 'required',
            'file' => 'required|mimes:pdf',
            'death_line' => 'required|date',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file;
            $destination = 'public/uploads/circular';
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs($destination,$name);
            $input['file'] = $name;
            Circular::create($input);
            return redirect()->route('admin.circular.index');
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
        $circular = Circular::find($id);
        return view('backend.job.circular.edit',compact('circular'));
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
        $circular = Circular::find($id);
        $validated = $request->validate([
            'post' => 'required',
            'death_line' => 'required|date',
        ]);
        $circular->update([
            'post' => $request->post,
            'death_line' => $request->death_line,
        ]);
        return redirect()->route('admin.circular.index');
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
