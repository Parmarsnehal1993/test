<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentLoginDetail extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'agent_id');
    }
}
