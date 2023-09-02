<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billboards extends Model
{
    use HasFactory;
    protected $table = 'billboards';
    protected $fillable = [
        'id', 'latitude', 'longtitude', 'address', 'media_type', 'pole_height',
        'height', 'width', 'description', 'price', 'owner_id', 'empty', 'created_at', 'updated_at'
    ];
}
