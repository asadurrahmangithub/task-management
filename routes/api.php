<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::controller(FrontEndController::class)->group(function () {
    Route::get('/blog-data', 'showData')->name('show.blog');

    Route::get('/blog-details/{id}', 'blogDetailsApi')->name('blog.details.api');
});
