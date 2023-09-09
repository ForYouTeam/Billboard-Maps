<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\BillboardContract;
use App\Contracts\ImageContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillboardRequest;
use App\Models\owners;
use App\Repositories\BillboardRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class BillboardController extends Controller
{
    private BillboardContract $billboardRepo;
    private ImageContract $imageRepo;
    public function __construct()
    {
        $this->billboardRepo = new BillboardRepository;
        $this->imageRepo     = new ImageRepository    ;
    }

    public function index()
    {
        $data = owners::all();
        return view('backoffice.billboard', compact('data'));
    }

    public function getAllData(){
        $result = $this->billboardRepo->getAllPayload([]);
        return response()->json($result, $result['code']);
    }

    public function upsertData(BillboardRequest $request){
        $id = $request->id | null;
        $result = $this->billboardRepo->upsertPayload($id, $request->except('_token'));

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id = 0) {
        $result = $this->billboardRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id = 0) {
        $images = $this->imageRepo->deletePayload($id);
        
        if ($images['code'] !== 200) {
            return response()->json($images, $images['code']); 
        }

        $result = $this->billboardRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
