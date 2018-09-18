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

    Route::	resource('customers', 'CustomerController');
    Route:: post('/customers/{id}', 'CustomerController@blockCustomer')->name('customers.blockCustomer');



    //stocks
    Route::	resource('accessories', 'AccessoryController');
    Route:: get('/accessories/{id}', 'AccessoryController@destroy')->name('accessories.destroy');

    Route::	resource('styles', 'StyleController');
    Route:: get('/styles/{id}', 'StyleController@destroy')->name('styles.destroy');
    Route:: get('/viewstyle', 'StyleController@viewstyle')->name('viewstyle');
    Route:: post('/viewstyle.search', 'StyleController@search')->name('viewstyle.search');
    Route:: post('viewstyle/book', 'StyleController@book')->name('viewstyle.book');


    Route::	resource('services', 'ServiceController');
    Route:: get('/services/{id}', 'ServiceController@destroy')->name('services.destroy');


    

    //official
    Route::	resource('staffs', 'StaffController');
    Route:: get('/staffs/{id}', 'StaffController@destroy')->name('staffs.destroy');
    Route::	resource('assets', 'AssetController');
    Route:: get('/assets/{id}', 'AssetController@destroy')->name('assets.destroy');
    Route::	resource('roles', 'RoleController');
    Route:: get('/roles/{id}', 'AssetController@destroy')->name('roles.destroy');

    //logout function
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
});
