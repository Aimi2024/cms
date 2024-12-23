<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'dashboard');
});

Route::get('/medicine', function () {
    return view(view: 'medicine');
});
