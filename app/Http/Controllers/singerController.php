<?php

namespace App\Http\Controllers;

use App\model\singer;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class singerController extends Controller
{
    public $singer;
    use StorageImageTrait;
    public function __construct(singer $singer)
    {
        $this->singer = $singer;
    }
    public function index()
    {
        $dataSinger = $this->singer->latest()->paginate(3);
        return view('singer.index', compact('dataSinger'));
    }

    public function create()
    {
        return view('singer.add');
    }

    public function store(Request $request)
    {
        $createSinger = [
            'name' => $request->name,
            'date_and_birth' => $request->date_and_birth,
            'description' => $request->description
        ];
        $image_path = $this->StorageImageTrait($request, 'feature_image_path', 'image_singer');
        $createSinger['feature_image_path'] = $image_path['image_path'];
          $this->singer->create($createSinger);
        return redirect()->route("singer.index");
    }

    public function edit($id)
    {
        $dataSinger = $this->singer->find($id);
        return view('singer.edit',compact('dataSinger'));
    }

    public function update(Request $request,$id)
    {
        $updateSinger = [
            'name' => $request->name,
            'date_and_birth' => $request->date_and_birth,
            'description' => $request->description
        ];
        $image_path = $this->StorageImageTrait($request, 'feature_image_path', 'image_singer');
        $updateSinger['feature_image_path'] = $image_path['image_path'];
          $this->singer->find($id)->update($updateSinger);
        return redirect()->route("singer.index");
    }

    public function delete($id)
    {
        $this->singer->find($id)->delete();
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ],200);
    }
}
