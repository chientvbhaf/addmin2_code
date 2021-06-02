<?php
namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait delete_model_traits{
    public function delete_model_traits($sliders,$id){
        try {
            $sliders->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        } catch (\Exception $exception) {
            Log::error('message: '.$exception->getMessage().'line: '.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
}