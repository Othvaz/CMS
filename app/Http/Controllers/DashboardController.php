<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $markers = Marker::with(['pattern','video'])->where('status',1)->get();
        return view('dashboard',['markers'=>$markers]);
    }

    //
}
