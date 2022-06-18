<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::middleware('web')->group(function () {
    Route::get('/v1/form', [ContactController::class, 'form'])->name('form');
});

Route::post('/v1/comfirm', [ContactController::class, 'comfirm'])->name('comfirm');
Route::post('/v1/register', [ContactController::class, 'register'])->name('register');

Route::apiResource('/v1/contact', ContactController::class)->only([
    'index', 'store', 'destroy'
]);

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/