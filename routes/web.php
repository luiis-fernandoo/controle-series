<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\seriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use App\Mail\SeriesCreated;
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


Route::resource('/series', seriesController::class);

Route::middleware('autenticador')->group(function(){

    Route::get('/', function(){
        return redirect('/series');
    })->name('series.index');

    Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('seasons.index');

    Route::get('/seasons/{seasons}/episodes', [EpisodeController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{seasons}/episodes', [EpisodeController::class, 'update'])->name('episodes.update');


});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');

Route::get('/email', function(){
    return new SeriesCreated(
        'The Crown',
        3,
        10,
        1
    );
});

