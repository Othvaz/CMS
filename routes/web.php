<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::get('/login', [AuthController::class,'index'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::post('/login', [AuthController::class,'login_function']);



Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/info', [HomeController::class,'info'])->name('info');

//Markers
    Route::get('/markers',[MarkerController::class,'index'])->name('markers');
    Route::get('/markers/create',[MarkerController::class,'create_marker'])->name('marker.create_view');
    Route::post('/markers',[MarkerController::class,'store_marker'])->name('marker.create');

    Route::get('/marker/{id}', [MarkerController::class,'marker_detail'])->name('marker.detail');
    Route::post('/marker/{id}', [MarkerController::class,'statusChange_and_updateMarker']);

    Route::get('/marker/update/{id}',[MarkerController::class,'update_marker_view'])->name('marker.update_view');
    Route::post('/marker/update/{id}',[MarkerController::class,'statusChange_and_updateMarker'])->name('marker.update');

    //Videos
    Route::get('/videos', [VideoController::class,'index'])->name('videos');
    Route::post('/videos', [VideoController::class,'store_video'])->name('video.create');
    Route::get('/videos/delete_all', [VideoController::class, 'delete_all'])->name('video.mass_delete');

    Route::get('/video/update/{id}', [VideoController::class,'video_update'])->name('video.update');
    Route::post('/video/update/{id}', [VideoController::class,'video_save']);

    Route::get('/video/{id}', [VideoController::class,'video_detail'])->name('video.detail');
    Route::post('/video/{id}', [VideoController::class,'delete_video']);

    Route::get('/pattern/{id}', [PatternController::class,'pattern_detail'])->name('pattern.detail');
    Route::post('/pattern/{id}', [PatternController::class,'delete_pattern']);

    Route::get('/patterns/update/{id}', [PatternController::class, 'update_pattern_view'])->name('pattern.update');
    Route::post('/patterns/update/{id}', [PatternController::class,'update_pattern']);

    Route::get('/patterns', [PatternController::class,'index'])->name('patterns');
    Route::post('/patterns', [PatternController::class,'store_pattern'])->name('pattern.create');
});

// Route::delete('/video/{id}', [VideoController::class,'delete_video']);