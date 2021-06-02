<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    //
    protected $fillable=[
        'image_path',
        'product_id',
        'image_name'
    ];
}
