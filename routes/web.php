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
})->name('home');

Route::view('/fitur', 'pages.fitur')->name('page.fitur');
Route::view('/harga', 'pages.harga')->name('page.harga');

Route::view('page', [ App\Http\Controllers\HomeController::class, 'page'])->middleware('auth');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function(){

	Route::get('/member/soal' , [App\Http\Controllers\Member\SoalController::class , 'index'])->name('member.soal');
	Route::get('/member/ujian/{exam}' , [App\Http\Controllers\Member\UjianController::class , 'soal'])->name('member.ujian');


});

//Route Hooks - Do not delete//
	Route::view('examevents', 'livewire.examevents.index')->middleware('auth')->name('examevents');
	Route::view('exam_events', 'livewire.exam-events.index')->middleware('auth');
	Route::view('transactions', 'livewire.transactions.index')->middleware('auth')->name('admin.transactions');
	Route::view('payment_methods', 'livewire.payment-methods.index')->middleware('auth')->name('admin.payment_methods');
	Route::view('users', 'livewire.users.index')->middleware('auth')->name('admin.users');
	Route::view('settings', 'livewire.settings.index')->middleware('auth')->name('admin.settings');
	Route::view('scores', 'livewire.scores.index')->middleware('auth')->name('admin.scores');
	Route::view('questions', 'livewire.questions.index')->middleware('auth')->name('admin.questions');
	Route::view('exams', 'livewire.exams.index')->middleware('auth')->name('admin.exams');
