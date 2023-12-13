<?php

use App\Http\Controllers\Api\WaktuUjianController;
use App\Http\Controllers\MidtransController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/m/notif' , [MidtransController::class , 'notif']);

Route::get('/cek-waktu/{id}' , [WaktuUjianController::class , 'cek_waktu']);
// Route::post('/kurangi-waktu' , [WaktuUjianController::class , 'kurangi_waktu']);


// http://arstamedia.com/api/m/notif
