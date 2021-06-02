<?php

namespace App\Http\Controllers;

use App\Http\Requests\Add_slider_validation;
use App\model\slider;
use App\Traits\delete_model_traits;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class sliderController extends Controller
{
    //
    use StorageImageTrait;
    use delete_model_traits;
    public $sliders;
    public function __construct(slider $slider)
    {
        $this->sliders= $slider;
    }
    public function index(){
        $data= $this->sliders->latest()->paginate(3);
        return view('slider.index',compact('data'));
    }
    public function create(){
        return view('slider.add');
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $data=[
                'name'=>$request->name,
                'description'=>$request->description
            ];
            $file =$this->StorageImageTrait($request,'image_path','slider');
            if(!empty($file)){
                $data['image_name']=$file['file_name'];
                $data['image_path']=$file['image_path'];
            }
    
            $this->sliders->create($data);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message: '.$exception->getMessage().'line: '.$exception->getLine());
        }
    }
    public function edit($id){
        $data=$this->sliders->find($id);
        return view('slider.edit',compact('data'));
    }
    public function update(Request $request,$id){
        try {
            DB::beginTransaction();
            $dataupdate=[
                'name'=>$request->name,
                'description'=>$request->description
            ];
            $file =$this->StorageImageTrait($request,'image_path','slider');
            if(!empty($file)){
                $dataupdate['image_name']=$file['file_name'];
                $dataupdate['image_path']=$file['image_path'];
            }
    
            $this->sliders->find($id)->update($dataupdate);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message: '.$exception->getMessage().'line: '.$exception->getLine());
        }
    }
    public function delete($id){
        $data= $this->delete_model_traits($this->sliders,$id);
        return $data;
    }
}
