<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
  return '測試自訂路由';
});

Route::get('/dashboards', function () {
  return 'Dashboard';
})->middleware('checkauth');
