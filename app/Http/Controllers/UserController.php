<?php

namespace App\Http\Controllers;

use App\model\role;
use App\Traits\delete_model_traits;
use App\Traits\StorageImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    use StorageImageTrait;
    use delete_model_traits;
    public $users;
    public $roles;
    public function __construct(User $user,role $role)
    {
        $this->users=$user;
        $this->roles =$role;
        
    }
    public function index(){
       $data= $this->users->latest()->paginate(3);
        return view('User.index',compact('data'));
    }
    public function create(){
      $dataRole=  $this->roles->all();
        return view('User.add',compact('dataRole'));
    }
    public function store(Request $request){
        $insertUser= [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->pass)       
        ];
        $feature_image = $this->StorageImageTrait($request,'feature_image','user');
        if(!empty($feature_image)){
                $insertUser['feature_image_path'] = $feature_image['image_path'];
                $insertUser['image_name'] = $feature_image['file_name'];
        }
        
        $datarole= $this->users->create($insertUser);
        $datarole->role()->attach($request->optionrole);
        return redirect()->route('user.index');
    }
    public function edit($id){
        $user =$this->users->find($id);
        $dataRole = $this->roles->all();
        $roleOfUser =$user->role;
        return view('User.edit',compact('user','dataRole','roleOfUser'));
    }
    public function update(Request $request,$id){
        $updatetUser= [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->pass)       
        ];
        $feature_image = $this->StorageImageTrait($request,'feature_image','user');
        if(!empty($feature_image)){
                $updatetUser['feature_image_path'] = $feature_image['image_path'];
                $updatetUser['image_name'] = $feature_image['file_name'];
        }
  
        $this->users->update($updatetUser);
        $datarole= $this->users->find($id);
        $datarole->role()->sync($request->optionrole);
        return redirect()->route('user.index');
    }
    public function delete($id){
        $user = $this->users;
        $actionDelete= $this->delete_model_traits($user,$id);
        return $actionDelete;
    }
}
