<?php

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

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\CsvController;

Route::get('/', function () {
    return view('welcome');
});

// TODO: create a support.memberz.org domain and put all the web routes behind
// an authentication system
Route::prefix('jobs')->group(function () {
    Route::queueMonitor();
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/activities', [ActivityLogController::class, 'logs']);

Route::get('/csv', [CsvController::class, 'index']);
