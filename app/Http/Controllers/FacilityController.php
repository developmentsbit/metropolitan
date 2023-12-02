<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\FacilityInterface;
use App\Models\Facility;
use App\Models\FacilityImage;

class FacilityController extends Controller
{
    public $interface;
    public function __construct(FacilityInterface $interface)
    {
        $this->interface = $interface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->interface->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->interface->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->interface->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->interface->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->interface->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->interface->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->interface->destroy($id);
    }

    public function loadFacilityImage($id)
    {
        $data = Facility::find($id)->chilldren;
        return view('admin.facility.load_image',compact('data'));
    }

    public function submitImage(Request $request)
    {
        $data=[];
        $data['facility_id'] = $request->id;
        $data['image_title'] = $request->image_title;
        $file = $request->file('image');
        if($file)
        {
            $imageNme = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/facility_image/',$imageNme);
            $data['image_name'] = $imageNme;
        }
        FacilityImage::create($data);
        return 1;
    }

    public function deleteImage($id)
    {
        $pathImage = FacilityImage::find($id);
        $path = public_path().'/facility_image/'.$pathImage->image_name;
        if(file_exists($path))
        {
            unlink($path);
        }
        FacilityImage::find($id)->delete();
        return 1;
    }

    public function imagetitleUpdate(Request $request,$id)
    {
        FacilityImage::find($id)->update([
            'image_title' => $request->imageTitle,
        ]);
        return 1;
    }

    public function restore($id)
    {
        return $this->interface->restore($id);
    }

    public function delete($id)
    {
        return $this->interface->delete($id);
    }
}
