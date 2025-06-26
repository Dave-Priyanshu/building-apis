<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/razorpay', [RazorpayController::class, 'showPaymentForm'])->name('razorpay.form');
Route::post('/razorpay/initiate', [RazorpayController::class, 'initiatePayment'])->name('razorpay.initiate');
Route::post('/razorpay/verify', [RazorpayController::class, 'verifyPayment'])->name('razorpay.verify');
Route::get('/razorpay/success', [RazorpayController::class, 'paymentSuccess'])->name('razorpay.success');
