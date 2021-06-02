<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'name','price','content','user_id','category_id','file_name','feature_image_path','mp3_path','mp3_origin'
      ];
      public function product_image()
      {
          return $this->hasMany(product_images::class,'product_id');
      }
      public function tags(){
        return $this->belongsToMany(tags::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
      }
      public function category(){
        return $this->belongsTo(category::class, 'category_id');
      }
      public function user(){
        return $this->belongsTo(User::class,'user_id');
      }
      public function singer(){
        return $this->belongsToMany(singer::class,'product_singers','product_id','singer_id');
      }
}
