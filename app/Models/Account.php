<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'accounts';

    protected $fillable = [
        'userId', 'agentId', 'fee', 'dueDate', 'clawBack', 'cancelledDate'
    ];

    public function agentByZCaseType()
    {
        return $this->hasMany(UserNames::class,  'assigned_to', 'agentId');
    }

    public function userName()
    {
        return $this->belongsTo(User::class,  'agentId', 'id');
    }
    /*public function userCallback()
    {
        return $this->hasOne(UserCallback::class,  'userId', 'userId');
    }*/
}
