<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
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


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']);
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);


Route::post('upload-contact', [ContactController::class,'uploadContact']);

Route::get('/products', [ProductController::class,'index']);
Route::post('/upload-file', [ProductController::class,'uploadFile']);
Route::get('/products/{product}', [ProductController::class,'show']);

//Mailchimp
Route::post('newsletter', [NewsletterController::class,'subscribeNewsletter']);

//Contact
Route::post('upload-contact', [ContactController::class,'uploadContact']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::patch('users/{user}', [UserController::class, 'update']);
    Route::get('users/{user}/orders', [UserController::class, 'showOrders']);


    Route::patch('products/{product}/units/add', [ProductController::class,'updateUnits']);
    Route::resource('/products', ProductController::class)->except(['index', 'show']);


    Route::patch('contact/{contact}/replied', [ContactController::class,'repliedContact']);
    Route::resource('/contact', ContactController::class);

});
