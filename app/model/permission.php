<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    //
    public function permissionChildrent()
    {
        return $this->hasMany(permission::class, 'parent_id');
    }
    protected $fillable=[
        'name','display_name','parent_id','key_code'
    ];
}
