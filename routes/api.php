<?php
use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\BidController;
use App\Http\Controllers\API\v1\OrderController;
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

Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['middleware' => ['customer']], function () {
        Route::apiResource('orders', OrderController::class);
    });
    Route::group(['middleware' => ['executor']], function () {
        Route::apiResource('bids', BidController::class);
        Route::get('executors/orders', [OrderController::class, 'getForExecutor']);
    });
});
