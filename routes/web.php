<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    abort(404);
});


Route::get('/test', function () {
    return request()->getHost();
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
