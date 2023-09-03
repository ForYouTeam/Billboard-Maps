<?php

namespace App\Repositories;

use App\Contracts\OwnerContract;
use App\Models\owners;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;

class OwnerRepository implements OwnerContract
{
  use HttpResponseModel;
  
  private owners $ownerModel;
  public function __construct()
  {
    $this->ownerModel = new owners();
  }

  public function getAllPayload(array $payload)
  {
    try {

      $data = $this->ownerModel->all();

      return $this->success($data, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function upsertPayload(int|bool $id, array $payload)
  {
    try {

      if ($id) {
        $find = $this->getPayloadById($id);
        if ($find['code'] !== 200) {
          return $find;
        }

        $payload['updated_at'] = Carbon::now();
        $result = [
          'data' => $this->ownerModel->whereId($id)->update($payload),
          'message' => 'Updated data successfully'
        ];

      } else {
        $result = [
          'data' => $this->ownerModel->create($payload),
          'message' => 'Created data successfully'
        ];
      }

      return $this->success($result['data'], $result['message']);
    } catch (\Throwable $th) {
      
      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function getPayloadById(int $id)
  {
    try {
      
      $find = $this->ownerModel->whereId($id)->first();

      if (!$find) {
        return $this->error('data not found', 404);
      }

      return $this->success($find, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  } 

  public function deletePayload(int $id)
  {
    try {

      $find = $this->getPayloadById($id);
      if ($find['code'] != 200) {
        return $find;
      }
      
      $data = $this->ownerModel->whereId($id)->delete();

      return $this->success($data, "success deleting data");
    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }
}