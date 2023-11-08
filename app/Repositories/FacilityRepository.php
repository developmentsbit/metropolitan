<?php
namespace App\Repositories;

use App\Interfaces\FacilityInterface;
use App\Models\Facility;
use App\Models\FacilityImage;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class FacilityRepository implements FacilityInterface{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.facility';
    }
    public function index()
    {
        $data = [];
        $data['facility'] = Facility::with('creator')->with('editor')->get();
        $data['sl'] = 1;
        return view($this->path.'.index',compact('data'));
    }
    public function create()
    {
        return view($this->path.'.create');
    }

    public function store($request)
    {
        Facility::create([
            "title" => $request->title,
            "title_bn" => $request->title_bn,
            "description" => $request->description,
            "description_bn" => $request->description_bn,
        ]);
        Toastr::success(__('Facilites Added Successfully'));
        return redirect()->back();
    }

    public function show($id)
    {
        $data = [];
        $data['facility'] = Facility::find($id);
//        $data['images'] = Facility::find($id)->chilldren;
        return view($this->path.'.show',compact('data'));
    }

    public function edit($id)
    {
        $data = Facility::find($id);
        return view($this->path.'.edit',compact('data'));
    }

    public function update($request,$id)
    {
        Facility::find($id)->update([
            "title" => $request->title,
            "title_bn" => $request->title_bn,
            "description" => $request->description,
            "description_bn" => $request->description_bn,
            'edit_by' => Auth::user()->id,
        ]);
        Toastr::success(__('Facilites Updated Successfully'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        Facility::find($id)->delete();
        Facility::withTrashed()->where('id',$id)->update([
            'delete_by' => Auth::user()->id,
        ]);
        Toastr::success(__('Facilites Delete Successfully'));
        return redirect()->back();
    }

    public function restore($id)
    {
        Facility::withTrashed()->where('id',$id)->restore();
        Facility::withTrashed()->where('id',$id)->update([
            'restore_by' => Auth::user()->id,
        ]);
        Toastr::success(__('Facilites Restore Successfully'));
        return redirect()->back();
    }

    public function delete($id)
    {
        $images = FacilityImage::where('facility_id',$id)->get();
        foreach($images as $i)
        {
            $path = public_path().'/facility_image/'.$i->image_name;
            if(file_exists($path))
            {
                unlink($path);
            }
        }
        FacilityImage::where('facility_id',$id)->delete();
        Facility::withTrashed()->where('id',$id)->forceDelete();
        Toastr::success(__('Facilites Delete Successfully'));
        return redirect()->back();
    }
}