<?php

use App\Jobs\TestJob;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/queue', function () {
    TestJob::dispatch();

    return 'Job enqueued';
});

Route::get('/cache', function  () {
    $hits = Cache::increment('hits');
    return "Cache hit {$hits} times.";
});
