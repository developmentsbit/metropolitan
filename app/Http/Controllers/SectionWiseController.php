<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section_wise;

class SectionWiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = section_wise::find(1);

        return view('admin.section_wise.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insert= section_wise::find(1)->update($request->except('_token','image'));

        $file= $request->file('image');

        // $id=$insert->id;

        if($file)
        {
            $pathImage = section_wise::find(1);

            $path = public_path().'/assets/images/section_wise/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName=rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/images/section_wise/',$imageName);

            section_wise::where('id',1)->update(['image'=>$imageName]);
        }

        if($insert)
        {
            return redirect()->back()->with('message','Section Wise Student List Added Successfully');
        }
        else
        {
            return redirect()->back()->with('message','Section Wise Student List Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
