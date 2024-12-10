<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Variable;

class Video extends Model
{
    public $fillable = ['name','path'];
}
