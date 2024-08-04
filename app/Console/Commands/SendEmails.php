<?php

// app/Console/Commands/SendEmails.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    protected $signature = 'emails:send';
    protected $description = 'Send scheduled emails';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 放置發送電子郵件邏輯
        Mail::raw('測試使用scheduling發送郵件!', function ($message) {
            $message->to('example@example.com')->subject('Scheduled Email');
        });

        $this->info('發送成功!');
    }
}
