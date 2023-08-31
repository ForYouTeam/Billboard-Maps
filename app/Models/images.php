<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'id', 'billboard_id', 'image_path',
        'created_at', 'updated_at'
    ];
}
