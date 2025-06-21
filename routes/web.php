<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RegisterForm;
use App\Http\Controllers\RegisterController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/register-form', RegisterForm::class);
