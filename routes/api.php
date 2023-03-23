<?php

use App\Http\Controllers\AddOffer;
use App\Http\Controllers\GetOffer;
use App\Http\Controllers\Register;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => []], function () {
    Route::post('signup', [Register::class, 'signup']);
    Route::post('login', [Register::class, 'login']);
    Route::post('sendEmail', [Register::class, 'sendEmail']);
    Route::post('getTokenVerify', [Register::class, 'getToken']);
    Route::post('upDateVerify', [Register::class, 'upDateVerify']);
});
Route::group(['middleware' => []], function () {
    Route::post('uploadFile', [AddOffer::class, 'uploadFile']);

    Route::post('uploadInfo', [AddOffer::class, 'addOffer']);

    Route::post('newComment', [AddOffer::class, 'addComment']);

    Route::post('getAllOffers', [GetOffer::class, 'getAllOffers']);

    Route::post('getOfferComment', [GetOffer::class, 'getOfferComment']);

    Route::post('getOffer', [GetOffer::class, 'getOffer']);

    Route::post('getOfferImage', [GetOffer::class, 'getOfferImage']);

    Route::post('getOfferSite', [GetOffer::class, 'getOfferSite']);
});
