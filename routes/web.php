<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 


Auth::routes(['verify' => true]);
// Auth::routes();
Route::get('/','App\Http\Controllers\LoginController@index')->name('login-page');
Route::post('/login','App\Http\Controllers\LoginController@checkCred')->name('login');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');
Route::resources([
    'users' => 'App\Http\Controllers\LoginController'
]);
// Route::group(['prefix' => 'user','middlewire'=>'auth'], function () {
    Route::resources([
        'profile' => 'App\Http\Controllers\ProfileController'
    ]);
// });

// Route::group(['middleware' => ['auth']], function() {
//     /**
//     * Logout Route
//     */
//     Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
//  });



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
