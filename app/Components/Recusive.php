<?php
namespace App\Components;

class Recusive {

    public $data;
    public $categorySelect;
    public function __construct($data)
    {
        $this->data=$data;
        $this->categorySelect='';
    }
    public function CategoryRecusive($parentID,$id=0,$text=''){
        foreach ($this->data as $value){
            if($value->parent_id == $id){
                if(!empty($parentID) && $parentID == $value->id){
                    $this->categorySelect .="<option selected value=".$value->id.">".$text.$value['name']."</option>";
                }else{
                    $this->categorySelect .="<option value=".$value->id.">".$text.$value['name']."</option>";
                }
                $this->CategoryRecusive($parentID,$value->id,$text.'-');
            }
        }
        return $this->categorySelect;
    }
}