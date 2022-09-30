<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CardDeckController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\DeckProfileController;
use App\Http\Controllers\PatienttypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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

Route::get('type', [PatienttypeController::class, 'index']);
Route::post('type', [PatienttypeController::class, 'store']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('infomation', [UserController::class, 'show']);
        Route::post('infomation', [UserController::class, 'edit']);
    });
    Route::group(['prefix' => 'profile'], function () { //profiles
        Route::post('create', [ProfileController::class, 'store']); //+Replicate template(deck) +sync cards
        Route::get('list', [ProfileController::class, 'index']);
    });
    Route::group(['prefix' => 'profile/{id}'], function () { // profile
        Route::get('/', [ProfileController::class, 'show']);
        Route::post('edit', [ProfileController::class, 'edit']);
    });
    Route::group(['prefix' => 'profile/{id}/deck'], function () { //decks
        Route::get('list', [DeckController::class, 'index_show']); // all (unhidden)decks
        Route::get('edit', [DeckController::class, 'index_edit']); //all decks
        Route::post('create', [DeckController::class, 'create']); //add deck to profile's id
    });
    Route::group(['prefix' => 'deck/{deck:id}'], function () { //deck editting
        Route::get('/', [DeckController::class, 'show']);
        Route::post('edit', [DeckController::class, 'edit']);
        Route::post('hide', [DeckController::class, 'hide']);
        Route::post('delete', [DeckController::class, 'destroy']);
        Route::post('copy', [DeckProfileController::class, 'store']); // copy deck2profile
        Route::group(['prefix' => 'card'], function () { //deck->cards
            Route::get('list', [CardDeckController::class, 'index_show']); // all (unhidden)decks
            Route::get('edit', [CardDeckController::class, 'index_edit']); //all decks
            Route::post('create', [CardController::class, 'create']); // add new card2deck
        });
        Route::group(['prefix' => 'card/{card:id}'], function () { //card
            Route::get('/', [CardController::class, 'show']);
            Route::post('edit', [CardController::class, 'edit']);
            Route::get('delete', [CardController::class, 'destroy']);
            Route::post('hide', [CardDeckController::class, 'hide']);
        });
    });
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
