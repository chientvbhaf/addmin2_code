<?php

namespace App\Http\Controllers;

use App\model\permission;
use Illuminate\Http\Request;
use App\Components\Recusive;

class permissionController extends Controller
{
    //
    public $permissions;
    
    public function __construct(permission $permission)
    {
        $this->permissions =$permission;
    }
    public function getpermission($parentID){
        $dataPermission =$this->permissions->all();
        $recusive = new Recusive($dataPermission);
        /* CategoryRecusive() function lay ve recusive */
        $PermissionOption=$recusive->CategoryRecusive($parentID);
        return $PermissionOption;

    }
    public function create(){
        $PermissionOPtion = $this->getpermission($parentID='');
        return view('permission.add',compact('PermissionOPtion'));
    }
    public function store(Request $request){
        if($request->parent_id == 0){
            $this->permissions->create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'display_name'=> $request->name,
                'key_code' =>''
            ]);
        }else{
            $permissionFind = permission::where('id', $request->parent_id)->first();
            $this->permissions->create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'display_name'=> $request->display_name,
                'key_code' =>$permissionFind->name.'_'.$request->name
            ]);
        }
        return redirect()->route('permission.create');

        
    }
}
