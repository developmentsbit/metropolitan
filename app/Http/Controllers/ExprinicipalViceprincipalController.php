<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\ex_Principal_vice_principal;

class ExprinicipalViceprincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ex_Principal_vice_principal::get();
        return view('admin.ex_Principal_vice_principal.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ex_Principal_vice_principal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'type'=>$request->type,
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'designation'=>$request->designation,
            'profession'=>$request->profession,
            'duration'=>$request->duration,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'address'=>$request->address,
            'status'=>$request->status,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/ex_Principal_vice_principal/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = ex_Principal_vice_principal::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('ex_Principal_vice_principal.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('ex_Principal_vice_principal.index'));
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
        $data = ex_Principal_vice_principal::find($id);

        return view('admin.ex_Principal_vice_principal.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = ex_Principal_vice_principal::find($id);

            $path = public_path().'/assets/images/ex_Principal_vice_principal/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/ex_Principal_vice_principal/',$imageName);

            ex_Principal_vice_principal::where('id',$id)->update(['image'=>$imageName]);

        }

        $update = ex_Principal_vice_principal::find($id)->update([
            'type'=>$request->type,
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'designation'=>$request->designation,
            'profession'=>$request->profession,
            'duration'=>$request->duration,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('ex_Principal_vice_principal.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('ex_Principal_vice_principal.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ex_Principal_vice_principal::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('ex_Principal_vice_principal.index'));
    }
}
