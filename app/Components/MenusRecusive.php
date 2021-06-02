<?php

namespace App\Components;

class menusRecusive {
    public $data;
    public $menusSelect;
    public function __construct($data)
    {
        $this->data=$data;
        $this->menusSelect='';
    }
    public function menusRecusive($parentID,$id=0,$text=''){
        foreach ($this->data as $value){
            if($value->parent_id==$id){
                if(!empty($parentID) && $parentID == $value->id){
                    $this->menusSelect .="<option selected value=".$value->id.">".$text.$value->name."</option>";
                }else{
                    $this->menusSelect .="<option value=".$value->id.">".$text.$value->name."</option>";
                }
                $this->menusRecusive($parentID,$value->id,$text.'-');
            }
        }
        return $this->menusSelect;
    }
}