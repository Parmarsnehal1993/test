<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\MatchSendEmail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $emailJob = new MatchSendEmail();
        dispatch($emailJob);
        // Queue::push(new MatchSendEmail($emailJob));
    }
}
