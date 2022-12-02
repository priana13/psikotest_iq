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
Auth::routes();

Route::middleware('auth')->group(function(){

	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
	Route::get('/myprofile', [App\Http\Controllers\ProfileController::class, 'index'])->name('myprofile');

	Route::get('/member/soal' , [App\Http\Controllers\Member\SoalController::class , 'index'])->name('member.soal');
	Route::get('/member/soal/{type}' , [App\Http\Controllers\Member\TypeSoalController::class , 'index'])->name('member.soal.type');

	Route::get('/member/ujian/mulai/{exam}' , [App\Http\Controllers\Member\UjianController::class , 'index'])->name('mulai-ujian');
	Route::get('/member/ujian/{exam}' , [App\Http\Controllers\Member\UjianController::class , 'buat_event'])->name('member.buat_event');
	Route::get('/member/ujian/{exam}/{examevent}' , [App\Http\Controllers\Member\UjianController::class , 'ujian'])->name('member.ujian');
	Route::view('member/history', 'livewire.examevents.index')->name('member.history');
	Route::get('/checkout' , [App\Http\Controllers\CheckoutController::class , 'index'])->name('checkout');





	Route::middleware('admin')->group(function(){

		//Route Hooks - Do not delete//
		Route::view('posts', 'livewire.posts.index')->middleware('auth');
		Route::view('categories', 'livewire.categories.index')->middleware('auth');
		Route::view('examevents', 'livewire.examevents.index')->name('examevents');
		Route::view('exam_events', 'livewire.exam-events.index');
		Route::view('transactions', 'livewire.transactions.index')->name('admin.transactions');
		Route::view('payment_methods', 'livewire.payment-methods.index')->name('admin.payment_methods');
		Route::view('users', 'livewire.users.index')->name('admin.users');
		Route::view('settings', 'livewire.settings.index')->name('admin.settings');
		Route::view('scores', 'livewire.scores.index')->name('admin.scores');
		Route::view('questions', 'livewire.questions.index')->name('admin.questions');
		Route::view('exams', 'livewire.exams.index')->name('admin.exams');
		Route::view('tes-cermat' ,'livewire.tes-cermat.index')->name('admin.tes-kecermatan');


	});

});


