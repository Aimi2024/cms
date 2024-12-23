<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view(view: 'dashboard');
});

Route::get('/medicine', function () {
    return view(view: 'medicine');
});


Route::get('/equipments', function () {
    return view(view: 'equipments');
});


Route::get('/accounts', function () {
    return view(view: 'accounts');
});
