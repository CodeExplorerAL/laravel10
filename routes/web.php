<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Cache;
use App\Models\Book;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);


Route::get('/cache/set', function () {
    Cache::put('example_key', 'example_value', 10); // 設置緩存，1 分鐘後過期
    return '設置 Cache!';
});

Route::get('/cache/get', function () {
    $value = Cache::get('example_key');
    return $value ? "Cache 值: $value" : "找不到 Cache!";
});

Route::get('/cache/has', function () {
    if (Cache::has('example_key')) {
        return 'Cache 存在!';
    } else {
        return 'Cache 不存在!';
    }
});

Route::get('/cache/forget', function () {
    Cache::forget('example_key');
    return 'Cache 刪除!';
});

Route::get('/cache/set-ttl', function () {
    Cache::put('ttl_key', 'ttl_value', now()->addMinutes(5)); // 5 分鐘後過期
    return '設置帶有過期時間的緩存!';
});

Route::get('/cache/query', function () {
    $books = Cache::remember('books', 1, function () {
        return Book::all();
    });
    return $books;
});
