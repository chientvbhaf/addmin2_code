<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menus extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'id','name','parent_id','slug'
    ];
}

