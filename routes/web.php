<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RegisterForm;
use App\Http\Controllers\RegisterController;



// 1. Rute untuk RegisterController

Route::get('/register-form', RegisterForm::class);
