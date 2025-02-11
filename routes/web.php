<?php

use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/', LandingController::class );


Route::group(['middleware'=>['auth:sanctum','verified']], function(){
    // return view('dashboard');

    // appointmnt page
    Route::resource('appointment', AppointmentController::class);
    
    // payment page
    Route::resource('payment', PaymentController::class);


});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     // Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->name('dashboard');

    
// });



Route::group(['prefix'=>'backsite', 'as'=>'backsite.','middleware'=>['auth:sanctum','verified']], function(){
    // return view('dashboard');

    return view('dashboard');


});

