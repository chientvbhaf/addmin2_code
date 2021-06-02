<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait{
    public function StorageImageTrait($request,$fiel,$foder){
        if($request->hasFile($fiel)){
            $file = $request->file($fiel);
            $FileNameOrigin = $file->getClientOriginalName();
            $FileNameHash = Str::random($length=20).'.'.$file->extension();
            $path = $file->storeAs('public/'.$foder.'/'.auth()->id(),$FileNameHash);
            $data =[
                "file_name" => $FileNameOrigin,
                "image_path" => Storage::url($path)
            ];
            return $data;
        }else{
            return null;
        }
    }
    public function StorageImageTraitMultiple($file,$foder){

            $FileNameOrigin = $file->getClientOriginalName();
            $FileNameHash = Str::random($length=20).'.'. $file->extension();
            $path =$file->storeAs('public/'.$foder.'/'.auth()->id(),$FileNameHash);
            $data =[
                "file_name" => $FileNameOrigin,
                "image_path" => Storage::url($path)
            ];
            return $data;

    }
}
?>