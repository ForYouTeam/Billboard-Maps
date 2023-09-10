<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\ImageContract;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private ImageContract $imageRepo;
    public function __construct()
    {
        $this->imageRepo = new ImageRepository;
    }

    public function getAllData(){
        $billboardId = request('billboard_id');
        $result = $this->imageRepo->getAllPayload(['billboard_id' => $billboardId]);
        return response()->json($result, $result['code']);
    }

    public function upsertData(Request $request){
        $result = $this->imageRepo->upsertPayload($request->except('_token'));

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id = 0) {
        $result = $this->imageRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id = 0) {
        $result = $this->imageRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
