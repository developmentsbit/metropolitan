<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\running_notice;

class RunningNoticeController extends Controller
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
        $data = running_notice::get();
        return view('admin.running_notice.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.running_notice.create');
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
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/running_notice/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = running_notice::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('running_notice.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('running_notice.index'));
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
        $data = running_notice::find($id);

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.running_notice.edit',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = running_notice::find($id);

            $path = public_path().'/assets/images/running_notice/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/running_notice/',$imageName);

            running_notice::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = running_notice::find($id)->update([
            'date'=>$date,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('running_notice.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('running_notice.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        running_notice::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('running_notice.index'));
    }
}
