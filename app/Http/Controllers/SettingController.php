<?php

namespace App\Http\Controllers;

use App\Http\Requests\Add_Setting_validate;
use App\model\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public $setting;
    public function __construct(setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $data = $this->setting->latest()->paginate(3);
        return view('setting.index', compact('data'));

    }
    public function create(){
        return view('setting.add');
    }
    public function store(Request $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('setting.index');
    }
    public function edit($id){

        $data=$this->setting->find($id);
        return view('Setting.edit',compact('data'));
    }
    public function delete($id){
        try {
            $this->setting->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success',
            ],200);
        } catch (\Exception $exception) {
            return response()->json([
                'code'=>500,
                'message'=>'fail',
            ],500); 
        }

    }
}
