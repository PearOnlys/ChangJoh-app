<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CardDeckController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
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
Route::post('register', [SessionController::class, 'register']);
Route::post('login', [SessionController::class, 'login'])->middleware('guest');
Route::get('logout', [SessionController::class, 'logout'])->middleware('auth:api');
Route::post('forget', [SessionController::class, 'forget']);

Route::group(['middleware'=>['auth:api']],function(){
    Route::group(['prefix'=>'user'],function(){
        Route::get('profile', [UserController::class, 'show']);
        Route::post('profile', [UserController::class, 'update']);
    });
    Route::group(['prefix'=>'card'],function(){
        Route::get('index', [CardController::class, 'index']);
        Route::get('{id}', [CardController::class, 'show']);
        Route::post('create', [CardController::class, 'create']);
        Route::post('{id}/edit', [CardController::class, 'edit']);
        Route::get('{id}/delete', [CardController::class, 'destroy']);
    });
    Route::group(['prefix'=>'deck'],function(){
        Route::get('index', [DeckController::class, 'index']);
        Route::get('{id}', [DeckController::class, 'show']);
        Route::post('create', [DeckController::class, 'create']);
        Route::post('{id}/edit', [DeckController::class, 'edit']);
        Route::get('{id}/delete', [DeckController::class, 'destroy']);

        Route::get('{id}/cards', [CardDeckController::class, 'index']);
        Route::post('{id}/cards/add', [CardDeckController::class, 'store']);
    });
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
