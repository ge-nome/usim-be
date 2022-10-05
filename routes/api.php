<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\LibraryController;
use App\Http\Controllers\API\MedicalsController;
use App\Http\Controllers\api\PaymentsController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SessionsController;
use App\Http\Controllers\AuthController;
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


Route::post('/update', [StudentController::class, 'update']);
Route::post('/archive', [StudentController::class, 'delete']);
Route::post('/lib-update', [LibraryController::class, 'update']);
Route::post('/medical', [MedicalsController::class, 'store']);
Route::post('/medical-record', [MedicalsController::class, 'show']);
Route::post('/medical-update', [MedicalsController::class, 'update']);
Route::post('other-data', [StudentController::class, 'others']);

// Done 
Route::post('/add-student', [StudentController::class, 'store']);
Route::post('/dashboard', [StudentController::class, 'show']);
Route::post('/new-session', [SessionsController::class, "store"]);
Route::get('/list-session', [SessionsController::class, "index"]);
Route::post('/lib-new', [LibraryController::class, 'store']);
Route::post('/lib-hist', [LibraryController::class, 'show']);
Route::post('/admin-dashboard', [AdminController::class, 'show']);
Route::post('/transaction', [PaymentsController::class, 'store']);
Route::post('/view-transaction', [PaymentsController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
