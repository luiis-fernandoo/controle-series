<?php

use App\Http\Controllers\Api\ApiController;
use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/series', ApiController::class);

    Route::get('/series/{series}/seasons', function(Serie $series){
        return $series->seasons;
    });
    
    Route::get('/series/{series}/episodes', function(Serie $series){
        $episodes = $series->episodes;
        return $episodes;
    });
});

Route::post('/login', function(Request $request){
    $credentials = $request->only(['email', 'password']);
    $user = User::whereEmail($credentials['email'])->first();
    if(Auth::attempt($credentials) === false){
        return response()->json('unauthorized', 401);
    }
    $user = Auth::user();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);
});
