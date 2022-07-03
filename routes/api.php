<?php

use App\Http\Controllers\API\LibraryController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SessionsController;
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

Route::post('/add-student', [StudentController::class, 'store']);
Route::post('/dashboard', [StudentController::class, 'show']);
Route::post('/update', [StudentController::class, 'update']);
Route::post('/archive', [StudentController::class, 'delete']);

Route::post('/new-session', [SessionsController::class, "store"]);
Route::post('/list-session', [SessionsController::class, "index"]);

Route::post('/lib-new', [LibraryController::class, 'store']);
Route::post('/lib-hist', [LibraryController::class, 'show']);
Route::post('/lib-update', [LibraryController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
