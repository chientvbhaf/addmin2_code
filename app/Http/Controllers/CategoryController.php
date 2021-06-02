<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\category;
use App\Components\Recusive;
use Illuminate\Support\Str;
use App\Traits\delete_model_traits;
use Directory;
use League\CommonMark\Extension\HeadingPermalink\Slug\SlugGeneratorInterface;
use League\CommonMark\Normalizer\SlugNormalizer;

class CategoryController extends Controller
{
    //
    use delete_model_traits;
    public $category;
    public function __construct(category $category)
    {
        $this->category= $category;
    }

    public function getcategory($parentID){
        $data= $this->category->all();
        $recusive = new Recusive($data);
        $categoryOption=$recusive->CategoryRecusive($parentID);
        return $categoryOption;
    }
    public function create(){
        $categoryOption= $this->getcategory($parentID='');
        return view('Categories.add',compact('categoryOption'));
    }

    public function store(Request $request){
        $this->category->create([
            "name"=> $request->name ,
            "parent_id"=>$request->parent_id ,
            "slug"=> Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function index(){
        $data= $this->category->latest()->paginate(2);
        return view('Categories.index',compact('data')); 
    }


    public function edit($id){
        $data=$this->category->find($id);
        $categoryOption= $this->getcategory($data->parent_id);
        return view('Categories.edit',compact('data','categoryOption'));
    }

    public function update($id,Request $request){
        $this->category->find($id)->update([
            "name"=> $request->name ,
            "parent_id"=>$request->parent_id , 
            "slug"=>Str::slug('$request->name', '-')
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id){
        $data= $this->delete_model_traits($this->category,$id);
        return $data;
    }
}
