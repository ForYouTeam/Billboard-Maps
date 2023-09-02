<?php

namespace App\Contracts;

interface BillboardContract {
  public function getAllPayload(array $payload);
  public function upsertPayload(int | bool $id, array $payload);
  public function getPayloadById(int $id);
  public function deletePayload(int $id);
}