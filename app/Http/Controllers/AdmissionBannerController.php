<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\admission_banner;

class AdmissionBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = admission_banner::first();
        return view('admin.admission_banner.index',compact('data'));
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
        $data = array(
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
        );

        $file = $request->file('image');

        if($file)
        {
            $pathImage = admission_banner::first();
            $path = public_path().'/assets/images/admission_banner/'.$pathImage->image;
            if(file_exists($path))
            {
                unlink($path);
            }
        }
        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/admission_banner/',$imageName);

            $data['image'] = $imageName;
        }

        admission_banner::find(1)->update($data);
        return redirect()->back()->with('message','Data Update Success');
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
