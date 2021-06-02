<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Components\menusRecusive;
use App\model\menus;
use App\Traits\delete_model_traits;

class menusController extends Controller
{
    //
    use delete_model_traits;
    public $menus;
    public function __construct(menus $menus)
    {
        $this->menus=$menus;
    }

    public function index(){
        $data=$this->menus->latest()->paginate(2);
        return view('Menus.index',compact('data'));
    }

    public function getMenus($parentID){
        $data=$this->menus->all();
        $recusive= new menusRecusive($data);
        $menusOption=$recusive->menusRecusive($parentID);
        return $menusOption;
    }
    public function create(){
        $menusOption= $this->getMenus($parentID='');
        return view('Menus.add',compact('menusOption'));
    }
    public function store(Request $request){
        $this->menus->create([
            'name' => $request->name,
            'parent_id' =>$request->parent_id,
            'slug' => $request->name
        ]);
        return redirect()->route('menus.index');
    }

    public function edit($id){
        $data=$this->menus->find($id);
        $menusOption=$this->getMenus($data->parent_id);
        return view('Menus.edit', compact('data','menusOption'));
    }

    public function update($id,Request $request){
        $this->menus->find($id)->update([
            'name' => $request->name,
            'parent_id' =>$request->parent_id,
            'slug' => $request->name
        ]);
        return redirect()->route('menus.index');
    }

    public function delete($id){
        return $this->delete_model_traits($this->menus,$id);
    }
}
