<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home_page');
});

Route::view('page', [ App\Http\Controllers\HomeController::class, 'page'])->middleware('auth');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//Route Hooks - Do not delete//
	Route::view('transactions', 'livewire.transactions.index')->middleware('auth');
	Route::view('payment_methods', 'livewire.payment-methods.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('settings', 'livewire.settings.index')->middleware('auth');
	Route::view('scores', 'livewire.scores.index')->middleware('auth');
	Route::view('questions', 'livewire.questions.index')->middleware('auth');
	Route::view('exams', 'livewire.exams.index')->middleware('auth');
