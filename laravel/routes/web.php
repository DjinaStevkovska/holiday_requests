<?php

use App\Mail\DailyReport;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('welcome');
});


Route::post('/update/{id}', 'HolidayRequestsController@update');

Route::post('/holiday-request', 'HolidayRequestsController@store');

Route::get('/home', 'HolidayRequestsController@index');

Route::get('/edit/{id}', 'HolidayRequestsController@edit');

Route::get('/all-requests', 'HolidayRequestsController@show');




