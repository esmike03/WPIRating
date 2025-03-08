<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/Agent', function () {
    return view('agent');
})->name('agent.rate');

Route::get('/Customer', function () {
    $categories = Category::with('questions')->get();
    return view('customer', compact('categories'));
})->name('customer.rate');

Route::post('/agent-form', [FormController::class, 'store'])->name('form.submit');

Route::post('/customer-form', [FormController::class, 'store2'])->name('form2.submit');

Route::get('/questions/fetch', function () {
    $categories = Category::with('questions')->get();
    return response()->json(['categories' => $categories]);
})->name('questions.fetch');
