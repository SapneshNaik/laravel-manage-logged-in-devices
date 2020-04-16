<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logged-in-devices', 'LoggedInDeviceManager@index')
		->name('logged-in-devices.list')
		->middleware('auth');


Route::get('/logout/all', 'LoggedInDeviceManager@logoutAllDevices')
		->name('logged-in-devices.list')
		->middleware('auth');

Route::get('/logout/{device_id}', 'LoggedInDeviceManager@logoutDevice')
		->name('logged-in-devices.list')
		->middleware('auth');
