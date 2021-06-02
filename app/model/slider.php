<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class slider extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'name','image_name','image_path','description'
    ];
}
