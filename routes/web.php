<?php

use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\SpecialistController as BacksiteSpecialistController;
use App\Http\Controllers\Backsite\TransactionController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use Illuminate\Support\Facades\Route;

// route default laravel 
// Route::get('/', function () {
//     return view('welcome');
// });


// route default dari laravel jetsreem
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     // Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->name('dashboard');

    
// });


Route::resource('/', LandingController::class );

// return view('dashboard');

Route::group(['middleware'=>['auth:sanctum','verified']], function(){
    // return view('dashboard');
    

    // appointmnt page
    Route::resource('appointment', AppointmentController::class);
    
    // payment page
    Route::resource('payment', PaymentController::class);


});





Route::group(['prefix'=>'backsite', 'as'=>'backsite.','middleware'=>['auth:sanctum','verified']], function(){
    // return view('dashboard');

    // dashboard
    Route::resource('dashboard', DashboardController::class );
    
    // permission
    Route::resource('permission', PermissionController::class );

    // type user
    Route::resource('type_user', TypeUserController::class );
    
    // Specialist
    Route::resource('specialist', BacksiteSpecialistController::class );
    
    // config payment
    Route::resource('config_payment', ConfigPaymentController::class);

    Route::resource('role', RoleController::class );
    
    Route::resource('user', UserController::class );
    
    Route::resource('consultation', ConsultationController::class );
    
    Route::resource('config_payment', ConfigPaymentController::class );
    
    Route::resource('hospital_patient', HospitalPatientController::class );
    
    
    Route::resource('appointment', AppointmentController::class );
    
    Route::resource('transaction', TransactionController::class );

});

