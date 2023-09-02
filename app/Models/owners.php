<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owners extends Model
{
    use HasFactory;
    protected $table = 'owners';
    protected $fillable = [
        'id', 'name', 'company_name', 'email', 'address', 'phone', 'user_id',
        'created_at', 'updated_at'
    ];

    
}
