<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

#return view('home', ['videos'=>$videos]);

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function info(){
        phpinfo();
    }
    // public function video_detail($videoId){
    //     $video = Video::find($videoId);
    //     return view('video', ['video'=>$video]);
    // }

    // public function create_video(){
    //     return view('video_creation_form');
    // }

    // public function videos(){
    //     $videos = Video::all();
    //     return view('videos', ['videos'=>$videos]);
    // }

    // public function store_video(Request $request){
    //     // dd($request->all());
    //     $path = $request->file('video')->store('videos', 'public');
    //     Video::create([
    //         'name'=> $request->name,
    //         'path'=> $path
    //     ]);
    //     return redirect()->to('videos')->with('status','videos has been uploaded');
    // }

    // public function delete_video($videoId){
    //     $video = Video::find($videoId);
    //     $video->delete();
    //     return redirect()->to('videos')->with('status','videos has been deleted');
    // }

    // public function delete_all(){
    //     Video::where('id','!=',null)->delete();
    //     return redirect()->to('videos')->with('status','all vids deleted');
    // }

    // public function video_update($videoId){
    //     $video = Video::find($videoId);
    //     //dd($video);
    //     return view('video_update_form', ['video'=>$video]);
    // }

    // public function video_save(Request $request, $videoId){
    //     // dd($request->all());
    //     $name = $request->name;
    //     if($request->file('video'))
    //         $path = $request->file('video')->store('videos', 'public');
    //     $update_data = ['name'=>$name];
    //     if(isset($path))
    //         $update_data['path'] = $path;
    //     Video::find($videoId)->update($update_data);
    //     return redirect()->to('videos')->with('status','videos has been updated');
    // }
    
    // public function test(){
    //     return view('test');
    // }
}
