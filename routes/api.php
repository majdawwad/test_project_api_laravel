<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComputerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => ['api', 'jwt.verify'],
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::group(['middleware' => ['jwt.verify']], function ($router) {
    Route::get(
        '/computers',
        [ComputerController::class, 'index']
    );

    Route::get(
        '/computers/{id}',
        [ComputerController::class, 'show']
    );

    Route::post(
        '/computers/create_computer',
        [ComputerController::class, 'store']
    );

    Route::post(
        '/computers/update_computer/{id}',
        [ComputerController::class, 'update']
    );

    Route::post(
        '/computers/delete_computer/{id}',
        [ComputerController::class, 'destroy']
    );
});
