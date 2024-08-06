<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;

class ExampleController extends Controller
{
    public function sendEmail(Request $request)
    {
        $email = $request->input('email');

        // 推送發送歡迎郵件的任務到隊列
        SendWelcomeEmail::dispatch($email);

        return response()->json('Email queued for sending.');
    }
}
