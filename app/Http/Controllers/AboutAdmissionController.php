<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\about_admission;

class AboutAdmissionController extends Controller
{
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }

    public function getOriginalDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[1].'-'.$explode[2].'-'.$explode[0];

        return $date;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = about_admission::get();
        return view('admin.aboutadmission.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.aboutadmission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'date'=>$date,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/aboutadmission/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = about_admission::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('aboutadmission.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('aboutadmission.index'));
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
        $data = about_admission::find($id);

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.aboutadmission.edit',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = about_admission::find($id);

            $path = public_path().'/assets/images/aboutadmission/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/aboutadmission/',$imageName);

            about_admission::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = about_admission::find($id)->update([
            'date'=>$date,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('aboutadmission.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('aboutadmission.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        about_admission::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('aboutadmission.index'));
    }
}
