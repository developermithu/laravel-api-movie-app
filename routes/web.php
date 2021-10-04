<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



// movie
Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

// tv
Route::get('/tv-show', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv-show/{id}', [TvController::class, 'show'])->name('tv.show');

// actor
Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/{id}', [ActorController::class, 'show'])->name('actor.show');
// Route::get('/actors/page/{page?}', [ActorController::class, 'index']);  //pagination

Route::view('about-project', 'about-project');
Route::view('creator', 'creator');

// Route::any('/{any}', function () {
//     return redirect('/');
// });

// Deployment
Route::get('/view-cache', function () {
    Artisan::call('view:cache');
    return 'View cached';
});

Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cached';
});

Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return 'Route cached';
});

Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    return 'Cache cleared';
});
