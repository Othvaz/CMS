<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pattern;

class PatternController extends Controller
{
    public function index(){
        $patterns = Pattern::all();
        return view('patterns', ['patterns'=>$patterns]);
    }

    public function pattern_detail($patternId){
        $pattern = Pattern::find($patternId);
        return view('pattern',['pattern'=>$pattern]);
    }
    public function create_pattern(){
        return view('pattern_creation_form');
    } //unused
    public function update_pattern_view($patternId){
        $pattern = Pattern::find($patternId);
        return view('pattern_update_form',['pattern'=>$pattern]);
    }

    public function update_pattern(Request $request, $patternId){
        $origin = Pattern::find($patternId);
        $originTitle = $origin->title;
        $title = $request->title;
        if ($request->file('pattern') && $request->file('image')){
            $patternPath = $request->file('pattern')->store('videos', 'public');
            $imagePath = $request->file('image')->store('images', 'public');

        }
        $update_data = ['title'=> $title];
        if (isset($patternPath)){
            $update_data['path'] = $patternPath;
            $update_data['image'] = $imagePath;
        }
        Pattern::find($patternId)->update($update_data);
        return redirect()->route('patterns')->with('status',"Successfully updated $originTitle");
    }
        
    
    public function store_pattern(Request $request){
        $patternPath = $request->file('pattern')->store('patterns', 'public');
        $imagePath = $request->file('image')->store('images','public');
        Pattern::create([
            'title'=> $request->title,
            'path'=> $patternPath,
            'image'=> $imagePath
        ]);
        return redirect()->route('patterns')->with('status', 'pattern has been uploaded');
    }
    public function delete_pattern($patternId){
        $pattern = Pattern::find($patternId);
        $pattern->delete();
        return redirect()->route('patterns');
    }
}
