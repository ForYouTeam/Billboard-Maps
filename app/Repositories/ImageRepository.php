<?php

namespace App\Repositories;

use App\Contracts\ImageContract;
use App\Models\images;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class ImageRepository implements ImageContract
{
  use HttpResponseModel;
  
  private images $imageModel;
  public function __construct()
  {
    $this->imageModel = new images();
  }

  public function getAllPayload(array $payload)
  {
    try {

      $data = $this->imageModel->all();

      return $this->success($data, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function upsertPayload(mixed $payload)
  {
    try {
      $successUpload = 0;
      foreach ($payload['image_path'] as $image) {
        $now = Carbon::now();
        $uuid = Uuid::uuid4()->toString();
        $extension = $image->getClientOriginalExtension();
        $filename = $uuid . '.' . $extension;
        $path = $image->storeAs('public/billboard', $filename);
        
        $newPayload = [
          'billboard_id' => $payload['billboard_id'],
          'image_path'   => $path,
          'created_at'   => $now,
          'updated_at'   => $now
        ];

        $this->imageModel->insert($newPayload);
        Storage::url($path);

        $successUpload += 1;
      }

      return $this->success($successUpload, "success insert data");

    } catch (\Throwable $th) {
      
      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function getPayloadById(int $id)
  {
    try {
      
      $find = $this->imageModel->whereId($id)->first();

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

      $find = $this->imageModel->where('billboard_id', $id);

      if ($find->count() < 1) {
        return $this->error('image not found', 404);
      }

      foreach ($find->get() as $image) {
        Storage::delete($image['image_path']);
        $data = $this->imageModel->whereId($image['id'])->delete();
      }

      return $this->success($data, "success deleting data");
    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }
}