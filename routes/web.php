<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvShowsController;
use Illuminate\Support\Facades\Route;


/* Movies routes*/
Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

/* TvShows routes*/
Route::get('/tv', [TvShowsController::class, 'index'])->name('tvshows.index');
Route::get('/tv/{id}', [TvShowsController::class, 'show'])->name('tvshows.show');

/* Actors routes */
Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/{id}', [ActorController::class, 'show'])->name('actors.show');
