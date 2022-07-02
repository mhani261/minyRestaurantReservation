<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
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

Route::group(
    ['prefix' => 'forSale'],
    function ($route) {
        Route::group(
            ['prefix' => 'reservation'],
            function () {
                Route::get('reservations', [ReservationController::class, 'getReservations']);
                Route::post('create', [ReservationController::class, 'store']);
            }
        );

        Route::group(
            ['prefix' => 'meals'],
            function () {
                Route::get('availableMeals', [MealController::class, 'getAvailableMeals']);
            }
        );

        Route::group(
            ['prefix' => 'orders'],
            function () {
                Route::post('placeOrder', [OrderController::class, 'placeOrder']);
                Route::get('checkout/{table}', [OrderController::class, 'getCheckout']);
            }
        );
    }
);
