<?php

use Illuminate\Support\Facades\Route;

define('STORAGE_DISK', 'public');
define('PAGINATE', 10);

Route::get('/', function () {
    return view('welcome');
});
