<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vice_principal_message;

class VicePrincipalMessage extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = vice_principal_message::first();
        return view('admin.vice_principal.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name'=>$request->name,
            'name_bn'=>$request->name_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
        );

        $file = $request->file('image');

        if($file)
        {
            $pathImage = vice_principal_message::first();
            $path = public_path().'/vice_principal_image/'.$pathImage->image;
            if(file_exists($path))
            {
                unlink($path);
            }
        }
        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/vice_principal_image/',$imageName);

            $data['image'] = $imageName;
        }

        vice_principal_message::find(1)->update($data);
        return redirect()->back()->with('message','Vice Principal Message Update Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
