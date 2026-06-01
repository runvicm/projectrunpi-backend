<?php

use App\Http\Controllers\ApiDevlogController;
use App\Http\Controllers\ApiHomepageController;
use Illuminate\Support\Facades\Route;


Route::middleware(['throttle:30,1', 'api.secret'])->group(function () {
    Route::get('/homepage/devlog', [ApiHomepageController::class, 'devlog']);

    Route::get('/devlog/status', [ApiDevlogController::class, 'status']);
    Route::get('/devlog/list', [ApiDevlogController::class, 'logs']);
    Route::get('/devlog/view/{slug}', [ApiDevlogController::class, 'view']);
    Route::post('/devlog/view/{slug}', [ApiDevlogController::class, 'addView']);
});





// Route::domain(config('app.apiDomain'))->group(function () {

//     Route::get('/homepage/devlog', [ApiHomepageController::class, 'devlog']);

//     Route::get('/devlog/status', [ApiDevlogController::class, 'status']);
//     Route::get('/devlog/list', [ApiDevlogController::class, 'logs']);
//     Route::get('/devlog/view/{slug}', [ApiDevlogController::class, 'view']);
//     Route::post('/devlog/view/{slug}', [ApiDevlogController::class, 'addView']);
//     // Route::get('/logs', function () {
//     //     return response()->json([]);
//     // });


// });
