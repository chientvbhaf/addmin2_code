<?php

namespace App\Http\Controllers;
use App\model\category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\product_validation;
use App\model\products;
use App\model\product_images;
use App\model\singer;
use App\model\tags;
use App\Traits\delete_model_traits;
use App\User;
use App\Traits\StorageImageTrait;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    //
    use delete_model_traits;
    use StorageImageTrait;
    public $tags;
    public $category;
    public $product;
    public $product_images;
    public $singer;
    public function __construct(category $category,products $product,product_images $product_images,tags $tags,singer $singer)
    {
        $this->category=$category;
        $this->product=$product;
        $this->product_images=$product_images;
        $this->tags=$tags;
        $this->singer = $singer;
    }
        public function index()
        {
            $data= $this->product->latest()->paginate(3);
            return view('Products.index',compact('data'));
        }

    public function getCategory($parentid){
        $data=$this->category->all();
        $recusive= new Recusive($data);
        $categoryOption=$recusive->CategoryRecusive($parentid);
        return $categoryOption;

    }
    public function create(){
        $categoryOption= $this->getCategory($parentid='');
        $dataSinger = $this->singer->all();
        return view('Products.add',compact('categoryOption','dataSinger'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $insertData =[
                "name"=>$request->name,
                "price"=>$request->price,
                "content"=>$request->content,
                "user_id"=>auth()->id(),
                "category_id"=>$request->category,
            ];
           $data=$this->StorageImageTrait($request,'feature_image_path','product');
           if(!empty($data)){
               $insertData["feature_image_path"]=$data["image_path"];
               $insertData["file_name"]=$data["file_name"];
           }
           $dataMp3 =$this->StorageImageTrait($request,'mp3','mp3');
           if(!empty($dataMp3)){
               $insertData["mp3_path"]=$dataMp3["image_path"];
               $insertData["mp3_origin"]=$dataMp3["file_name"];
           }
           $product=$this->product->create($insertData);
           if($request->hasFile('image_path')){
               foreach ($request->image_path as $image_item){
                   $data=$this->StorageImageTraitMultiple($image_item,"product");
                   $product->product_image()->create([
                    "image_path"=>$data["image_path"],
                    "image_name"=>$data['file_name']
                   ]);
    
               }
           }
           if(!empty($request->chooseSinger)){
               foreach ($request->chooseSinger as $valuechooseSinger) {
                $dataSinger[]= $valuechooseSinger;
               }
               $product->singer()->attach( $dataSinger);

           }

           if (!empty($request->tags)){
            foreach($request->tags as $tagItem){
                $newTags = $this->tags->firstOrCreate([
                    'name' => $tagItem
                ]);
                $datas[]= $newTags->id;
               }
           }
           $product->tags()->attach($datas);
           DB::commit();
           return redirect()->route('product.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message: '.$exception->getMessage().'line :'.$exception->getLine());
        }
    }
    public function edit($id){
        $data= $this->product->find($id);
        $categoryOption= $this->getCategory($data->category_id);
        $dataSinger = $this->singer->all();
        $singerSlected = $data->singer;
        return view('Products.edit',compact('categoryOption','data','singerSlected','dataSinger'));
    }

    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $insertDataUpdate =[
                "name"=>$request->name,
                "price"=>$request->price,
                "content"=>$request->content,
                "user_id"=>auth()->id(),
                "category_id"=>$request->category,
            ];
           $data=$this->StorageImageTrait($request,'feature_image_path','product');
           if(!empty($data)){
               $insertDataUpdate["feature_image_path"]=$data["image_path"];
               $insertDataUpdate["file_name"]=$data["file_name"];
           }
           $dataMp3 =$this->StorageImageTrait($request,'mp3','mp3');
           if(!empty($dataMp3)){
               $insertDataUpdate["mp3_path"]=$dataMp3["image_path"];
               $insertDataUpdate["mp3_origin"]=$dataMp3["file_name"];
           }
           $this->product->find($id)->update($insertDataUpdate);
           $product=$this->product->find($id);
           if($request->hasFile('image_path')){
               $this->product_images->where('product_id',$id)->delete();
               foreach ($request->image_path as $image_item){
                   $data=$this->StorageImageTraitMultiple($image_item,"product");
                   $product->product_image()->create([
                    "image_path"=>$data["image_path"],
                    "image_name"=>$data['file_name']
                   ]);
               }
           }
           if(!empty($request->chooseSinger)){
            foreach ($request->chooseSinger as $valuechooseSinger) {
             $dataSinger[]= $valuechooseSinger;
            }
            $product->singer()->sync( $dataSinger);

        }
           if (!empty($request->tags)){
            foreach($request->tags as $tagItem){
                $newTags = $this->tags->firstOrCreate([
                    'name' => $tagItem
                ]);
                $datas[]= $newTags->id;
               }
           }
           $product->tags()->sync($datas);

           DB::commit();
           return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message: '.$exception->getMessage().'line :'.$exception->getLine());
        }
    }

    public function delete($id){
        return $this->delete_model_traits($this->product,$id);
    }

}
