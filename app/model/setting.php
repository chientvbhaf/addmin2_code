<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    //
    protected $fillable=['config_key','config_value','type'];
}
