<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use App\Models\Pattern;
use App\Models\Video;
use Illuminate\Http\Request;
use Validator;

class MarkerController extends Controller
{
    public function index(){
        
        $patterns = Pattern::all();
        $videos = Video::all();
        $markers = Marker::with(['pattern','video'])->get();
        return view('markers',compact('patterns', 'videos', 'markers'));
    }
    
    public function marker_detail($markerId){
        $marker = Marker::find($markerId);
        $patterns = Pattern::all();
        $videos = Video::all();

        return view('marker',['marker'=>$marker,'patterns'=>$patterns,'videos'=>$videos]);
    }

    public function create_marker(){
        $patterns = Pattern::all();
        $videos = Video::all();
        return view('marker_creation_form', compact('patterns','videos'));
    }

    #marker.create
    public function store_marker(Request $request){
        #dd($request->all());
        $validated = $request->validate([
            'pattern_id' => 'required|exists:patterns,id',
            'video_id' => 'required|exists:videos,id',
        ]);

        Marker::create([
            'name' => $request->name,
            'pattern_id' => $validated['pattern_id'],
            'video_id' => $validated['video_id'],
            'status' => 0,
        ]);
        return redirect()->to('markers');
    }
    // public function status_change($markerId){
    //     $marker = Marker::find($markerId);
    //     $marker->status = !$marker->status;
    //     $marker->save();
    //     return redirect()->route('marker.detail',['id'=>$markerId]);
    // }

    public function update_marker_view($markerId){
        $marker = Marker::with(['pattern','video'])->find($markerId);
        $patterns = Pattern::all();
        $videos = Video::all();
        return view('marker_update_form',['marker'=>$marker, 'patterns'=>$patterns, 'videos'=>$videos]);
    }
    public function statusChange_and_updateMarker(Request $request, $markerId){
        $marker = Marker::find($markerId);
        if ($request->has('status_change')) {
            $marker->status = !$marker->status;
            $marker->save();
            return redirect()->route('markers');
        }

        if($request->has('delete')){
            $marker = Marker::find($markerId);
            $marker->delete();
            return redirect()->route('markers');
        }

        // Handle marker updates
        if ($request->has('name')) {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'pattern_id' => 'required',
                'video_id' => 'required',
            ]);
            
            
            if ($validator->fails()){
                return redirect()->route('marker.update_view', ['id' => $markerId])->withErrors($validator)->withInput();
            }
            $validated = $validator->validated();
            // dd($validated);
            // dd(Marker::find($markerId));
            // dd($marker);
            $marker->update([
                'name'=>$validated['name'],
                'pattern_id'=> $validated['pattern_id'],
                'video_id'=> $validated['video_id'],
            ]);
            return redirect()->route('markers', ['id' => $markerId])->with('success', 'Marker updated
            !'); 
        }
    }
    public function deleteMarker($markerId){
    }
}
