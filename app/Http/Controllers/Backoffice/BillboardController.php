<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\BillboardContract;
use App\Http\Controllers\Controller;
use App\Repositories\BillboardRepository;
use Illuminate\Http\Request;

class BillboardController extends Controller
{
    private BillboardContract $billboardRepo;
    public function __construct()
    {
        $this->billboardRepo = new BillboardRepository;
    }

    public function getAllData(){
        $result = $this->billboardRepo->getAllPayload([]);
        return response()->json($result, $result['code']);
    }

    public function upsertData(Request $request){
        $id = $request->id | null;
        $result = $this->billboardRepo->upsertPayload($id, $request->except('_token'));

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id = 0) {
        $result = $this->billboardRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id = 0) {
        $result = $this->billboardRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
