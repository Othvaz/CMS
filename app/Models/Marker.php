<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    public $fillable = ['name', 'video_id', 'pattern_id', 'status'];
    public function video(){
        return $this->hasOne(Video::class,'id','video_id');
    }

    public function pattern(){
        return $this->hasOne(Pattern::class,'id','pattern_id');
    }
}
