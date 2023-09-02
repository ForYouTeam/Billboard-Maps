<?php

namespace App\Contracts;

interface ImageContract {
  public function getAllPayload(array $payload);
  public function upsertPayload(mixed $payload);
  public function getPayloadById(int $id);
  public function deletePayload(int $id);
}