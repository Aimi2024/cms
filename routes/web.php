<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view(view: 'dashboard');
});

Route::get('/medicine', function () {
    return view(view: 'medicine');
});
