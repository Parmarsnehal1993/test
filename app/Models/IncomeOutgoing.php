<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeOutgoing extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'type', 'sub_type'
    ];
}
