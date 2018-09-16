<?php

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

    Route::	resource('bookings', 'BookingController');
    Route::	resource('billings', 'BilingController');


    //official
    Route::	resource('staffs', 'StaffController');
    Route:: get('/staffs/{id}', 'StaffController@destroy')->name('staffs.destroy');


    Route::	resource('assets', 'AssetController');
    Route::	resource('roles', 'RoleController');

    //logout function
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

});
