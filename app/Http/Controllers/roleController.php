<?php

namespace App\Http\Controllers;

use App\model\permission;
use App\model\role;
use App\Traits\delete_model_traits;
use Illuminate\Http\Request;

class roleController extends Controller
{
    //
    use delete_model_traits;
    public $roles;
    public $permissions;
    public function __construct(role $role,permission $permission)
    {
        $this->roles =$role;
        $this->permissions =$permission;
    }
    public function index(){
        $data= $this->roles->latest()->paginate(3);
        return view('role.index',compact('data'));
    }
    public function create(){
        $permissionsParent= $this->permissions->where('parent_id',0)->get();
        return view('role.add',compact('permissionsParent'));
    }
    public function store(Request $request){
        $insertRoles=$this->roles->create([
            'name'=>$request->name,
            'display_name'=> $request->display_name
        ]);
        $insertRoles->permission()->attach($request->permisstionChildrent);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $role =$this->roles->find($id);
        $permissionParent =$this->permissions->where('parent_id',0)->get();
        $roleOprion =$role->permission;
        return view('role.edit',compact('role','permissionParent','roleOprion'));
    }
    public function update(Request $request,$id){
        $RolesUpdate=$this->roles->find($id)->update([
            'name'=>$request->name,
            'display_name'=> $request->display_name
        ]);
        $RolesUpdate = $this->roles->find($id);
        $RolesUpdate->permission()->sync($request->permisstionChildrent);
        return redirect()->route('role.index');
    }
    public function delete($id){
        $role=$this->roles;
       $action_delete = $this->delete_model_traits($role,$id);
        return $action_delete;
    }
}
