<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\SoalController;
use App\Http\Controllers\Member\TypeSoalController;
use App\Http\Controllers\Member\UjianController;
use App\Http\Controllers\PsikotesController;

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

	Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
	Route::get('/myprofile', [ProfileController::class, 'index'])->name('myprofile');

	Route::get('/member/soal' , [SoalController::class , 'index'])->name('member.soal');
	Route::get('/member/soal/{type}' , [TypeSoalController::class , 'index'])->name('member.soal.type');

	Route::get('/member/ujian/mulai/{exam}' , [UjianController::class , 'index'])->name('mulai-ujian');
	Route::get('/member/ujian/{exam}' , [UjianController::class , 'buat_event'])->name('member.buat_event');

	Route::get('/member/ujian/{exam}/{examevent}' , [UjianController::class , 'ujian'])->name('member.ujian');
	Route::get('/member/ujian/{exam}/{examevent}/{kolom}' , [UjianController::class , 'ujian_kolom'])->name('member.ujian-kolom');


	Route::view('member/history', 'livewire.examevents.index')->name('member.history');
	// checkout
	Route::get('/checkout' , [CheckoutController::class , 'index'])->name('checkout');
	Route::get('/checkout/thanks/{id}' , [CheckoutController::class , 'thanks'])->name('checkout.thanks');
	Route::get('/checkout/konfirmasi/{code}' , [CheckoutController::class , 'konfirmasi'])->name('checkout.konfirmasi');
	Route::post('/checkout/konfirmasi' , [CheckoutController::class , 'storeKonfirmasi'])->name('store_konfirmasi');
	Route::view('memberships', 'livewire.memberships.index')->middleware('auth')->name('admin.memberships');


	Route::middleware('admin')->group(function(){

		//Route Hooks - Do not delete//
		Route::view('confirmations', 'livewire.confirmations.index')->middleware('auth')->name('admin.confirmations');
		Route::view('packages', 'livewire.packages.index')->middleware('auth')->name('admin.packages');
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
		Route::get('exams/soal/{id}', [PsikotesController::class, 'soal'])->name('admin.exam_soal');
		Route::get('tes-cermat/create' ,[PsikotesController::class, 'createCermat'])->name('admin.createCermat');
		Route::post('tes-cermat/create' ,[PsikotesController::class, 'storeCermat'])->name('admin.storeCermat');

		Route::get('tes-cermat/{id}' ,[PsikotesController::class, 'soalKecermatan'])->name('admin.tes-kecermatan');


	});

});


