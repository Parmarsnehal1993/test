<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettingsGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'group_name', 'group_display_name', 'title', 'description'
    ];
}
