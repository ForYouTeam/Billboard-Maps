<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\OwnerContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\OwnersRequest;
use App\Repositories\OwnerRepository;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    private OwnerContract $ownerRepo;
    public function __construct()
    {
        $this->ownerRepo = new OwnerRepository;
    }

    public function index()
    {
        $data = $this->ownerRepo->getAllPayload([]);
        return view('backoffice.owner', compact('data'));
    }

    public function getAllData(){
        $result = $this->ownerRepo->getAllPayload([]);
        return response()->json($result, $result['code']);
    }

    public function upsertData(OwnersRequest $request){
        $id = $request->id | null;
        $result = $this->ownerRepo->upsertPayload($id, $request->except('_token'));

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id = 0) {
        $result = $this->ownerRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id = 0) {
        $result = $this->ownerRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
