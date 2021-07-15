<?php

use App\Http\Controllers\BoardCardController;
use App\Http\Controllers\BoardColumnsController;
use App\Http\Resources\BoardCardResource;
use App\Http\Resources\BoardColumnResource;
use App\Models\BoardCard;
use App\Models\BoardColumn;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/board-columns', function (){
    return BoardColumnResource::collection(BoardColumn::all());
});

Route::post('/board-columns', [BoardColumnsController::class, 'create']);
Route::delete('/board-columns/{id}', [BoardColumnsController::class, 'delete']);

Route::post('/board-cards', [BoardCardController::class, 'create']);
Route::get('/board-cards', function (){
    return BoardCardResource::collection(BoardCard::all());
});
