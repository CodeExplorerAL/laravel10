<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\BookServiceInterface;
use App\Services\BookService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BookServiceInterface::class, BookService::class);
    }

    public function boot()
    {
        //
    }
}
