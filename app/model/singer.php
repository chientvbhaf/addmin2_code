<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class singer extends Model
{
    protected $fillable = ['name','date_and_birth','feature_image_path','description'];
}
