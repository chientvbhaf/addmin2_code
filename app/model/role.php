<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    protected $fillable=['name','display_name'];
    public function permission(){
        return $this->belongsToMany(permission::class, 'permission_role', 'role_id', 'permission_id');
    }
    
}
