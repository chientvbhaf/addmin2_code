<?php

namespace App;

use App\model\role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public function role(){
        return $this->belongsToMany(role::class, 'user_role', 'user_id', 'role_id');
    }

    public function CheckPermissionAccess($keycode){
       $roles= auth()->user()->role;
       foreach ($roles as $ItemRoles) {
          $permissions= $ItemRoles->permission;
          if($permissions->contains('key_code',$keycode )){
              return true;
          }else{
              return false;
          }
       }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','feature_image_path','image_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
