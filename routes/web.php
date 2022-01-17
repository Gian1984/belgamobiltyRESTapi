<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

//Route::get('ping', function(){
//    $mailchimp = new \MailchimpMarketing\ApiClient();
//
//    $mailchimp->setConfig([
//        'apiKey' => config('services.mailchimp.key'),
//        'server' => 'us18'
//    ]);
//
//    $response = $mailchimp->lists->getAllLists();
//    ddd($response);
//});
