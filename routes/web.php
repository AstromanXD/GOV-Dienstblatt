<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('gov.dashboard');
});

Route::get('/documents', function () {
    return view('gov.documents');
});

Route::get('/calender', function () {
    return view('gov.calender');
});

Route::get('/registry_office', function () {
    return view('gov.registry_office');
});

Route::get('/namechange', function () {
    return view('gov.namechange');
});

Route::get('/namechange', function () {
    return view('gov.namechange');
});

Route::get('/namechange', function () {
    return view('gov.namechange');
});
