<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageRoutes as pg;
use App\Http\Controllers\ActorsController as ac;
use App\Http\Controllers\tvShows as tv;

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

Route::get('/', [pg::class, 'index']);
Route::get('/movie/{movie}', [pg::class, 'moviepost']);

Route::get('/actors', [ac::class, 'actors']);
Route::get('/actor/{actor}', [ac::class, 'actor']);

Route::get('/tv-shows', [tv::class, 'tvshows']);
Route::get('/tv-show/{tvshow}', [tv::class, 'tvshow']);
