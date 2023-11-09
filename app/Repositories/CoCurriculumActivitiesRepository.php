<?php
namespace App\Repositories;
use App\Interfaces\CoCurriculumActivitiesInterface;
use App\Models\CoCurriculamActivity;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class CoCurriculumActivitiesRepository implements CoCurriculumActivitiesInterface{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.co_curriculum';
    }
    public function index()
    {
        $data = [];
        $data['activity'] = CoCurriculamActivity::with('creator')->with('editor')->with('deletor')->get();
        $data['sl'] = 1;
        return view($this->path.'.index',compact('data'));
    }

    public function create()
    {
        return view($this->path.'.create');
    }

    public function store($request)
    {
        $data = [];
        $data['title'] = $request->title;
        $data['title_bn'] = $request->title_bn;
        $data['description'] = $request->description;
        $data['description_bn'] = $request->description_bn;
        $file = $request->file('image');
        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/co_curriculum/',$imageName);
            $data['image'] = $imageName;
        }
        CoCurriculamActivity::create($data);
        Toastr::success(__('Co Curriculum Activities Added Successfully'));
        return redirect()->back();
    }

    public function show($id){

    }

    public function edit($id)
    {
        $data = CoCurriculamActivity::find($id);
        return view($this->path.'.edit',compact('data'));
    }

    public function update($request,$id)
    {
        $data = [];
        $data['title'] = $request->title;
        $data['title_bn'] = $request->title_bn;
        $data['description'] = $request->description;
        $data['description_bn'] = $request->description_bn;
        $data['edit_by'] = Auth::user()->id;
        $file = $request->file('image');
        if($file)
        {
            $pathImage = CoCurriculamActivity::find($id);
            $path = public_path().'/co_curriculum/'.$pathImage->image;
            if(file_exists($path))
            {
                unlink($path);
            }
        }
        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/co_curriculum/',$imageName);
            $data['image'] = $imageName;
        }
        CoCurriculamActivity::find($id)->update($data);
        Toastr::success(__('Co Curriculum Activities Updated Successfully'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        CoCurriculamActivity::find($id)->delete();
        $data['edit_by'] = Auth::user()->id;
        CoCurriculamActivity::withTrashed()->where('id',$id)->update($data);
        Toastr::success(__('Co Curriculum Activities Delete Successfully'));
        return redirect()->back();
    }

    public function restore($id)
    {
        CoCurriculamActivity::withTrashed()->where('id',$id)->restore();
        $data['restore_by'] = Auth::user()->id;
        CoCurriculamActivity::withTrashed()->where('id',$id)->update($data);
        Toastr::success(__('Co Curriculum Activities Delete Successfully'));
        return redirect()->back();
    }

    public function delete($id)
    {
        $pathImage = CoCurriculamActivity::withTrashed()->where('id',$id)->first();
        $path = public_path().'/co_curriculum/'.$pathImage->image;
        if(file_exists($path))
        {
            unlink($path);
        }
        CoCurriculamActivity::withTrashed()->where('id',$id)->forceDelete();
        Toastr::success(__('Co Curriculum Activities Delete Successfully'));
        return redirect()->back();
    }
}
