<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\NewsletterController;
use App\Http\Controllers\API\ForgotPasswordController;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']);
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

Route::post('upload-contact', [ContactController::class,'uploadContact']);

//Mailchimp
Route::post('newsletter', [NewsletterController::class,'subscribeNewsletter']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/users', [AuthController::class, 'index']);
    Route::get('users/{user}', [AuthController::class, 'show']);
    Route::patch('users/{user}', [AuthController::class, 'update']);
    Route::get('users/{user}/orders', [AuthController::class, 'showOrders']);



    Route::patch('contact/{contact}/replied', [ContactController::class,'repliedContact']);
    Route::resource('/contact', ContactController::class);

});
