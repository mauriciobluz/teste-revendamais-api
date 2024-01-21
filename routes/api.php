<?php

use App\Http\Controllers\PostalCodeController;
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

Route::prefix('postal-code')->group( function() {
    Route::get('/{postalCode}/search', [PostalCodeController::class, 'show']);
    Route::get('/search-by-name', [PostalCodeController::class, 'searchByName']);
});