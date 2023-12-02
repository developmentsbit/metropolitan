<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MujibController extends Controller
{
    public function index()
    {
        $slider_first = DB::table('mujib_corner_photos')->where('type','1')->orderBy('id','DESC')->first();

        $slider_other = DB::table('mujib_corner_photos')->where('type','1')->orderBy('id','DESC')->skip(1)->take(10)->get();

        $images = DB::table('mujib_corner_photos')->where('type','0')->orderBy('id','DESC')->get();

        return view('mujib100.Layouts.home',compact('slider_first','slider_other','images'));
    }
    public function time_line()
    {
        return view('mujib100.User.time_line');
    }
    public function graphic_novel()
    {
        return view('mujib100.User.graphic_novel');
    }
    public function recognition()
    {
        return view('mujib100.User.recognition');
    }
    public function photo_archive()
    {
        return view('mujib100.User.photo_archive');
    }
    public function speeches()
    {
        return view('mujib100.User.speeches');
    }
}
