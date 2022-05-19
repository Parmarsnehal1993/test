<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalCounterValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'key', 'value', 'user_id'
    ];
}
