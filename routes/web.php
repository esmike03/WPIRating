<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/Agent', function () {
    return view('agent');
})->name('agent.rate');

Route::get('/Customer', function () {
    return view('customer');
})->name('customer.rate');

Route::post('/agent-form', [FormController::class, 'store'])->name('form.submit');

Route::post('/customer-form', [FormController::class, 'store2'])->name('form2.submit');
