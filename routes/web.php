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
    $data['title'] = "Login ";
    return view('auth.login', $data);
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('car', 'CarController')->middleware('auth');

Route::resource('brand', 'BrandController')->middleware('auth');

Route::resource('employee', 'EmployeeController')->middleware('auth');

Route::resource('client', 'ClientController')->middleware('auth');

Route::get('booking', ['as' => 'booking.index', 'uses' => 'BookingController@index' ])->middleware('auth');

Route::get('list-member', 'BookingController@listMember' )->middleware('auth');

Route::post('create-client', ['as' => 'create-client', 'uses' => 'BookingController@createClient' ])->middleware('auth');

Route::post('booking/details', ['as' => 'booking.calculate', 'uses' => 'BookingController@calculate'])->middleware('auth');

Route::post('booking/process', ['as' => 'booking.process', 'uses' => 'BookingController@process'])->middleware('auth');

Route::get('returns', ['as' => 'returns.index', 'uses' => 'ReturnController@index' ])->middleware('auth');

Route::get('returns/information', ['as' => 'returns.information', 'uses' => 'ReturnController@information'])->middleware('auth');

Route::post('returns/process', ['as' => 'returns.process', 'uses' => 'ReturnController@process'])->middleware('auth');

Route::get('reports/transaction', 'ReportController@index')->middleware('auth');

