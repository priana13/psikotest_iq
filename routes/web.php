<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CkEditorController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\SoalController;
use App\Http\Controllers\Member\TypeSoalController;
use App\Http\Controllers\Member\UjianController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PsikotesController;
use App\Http\Controllers\SettingController;

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

// cron job
// Route::get('/cron', [CronJobController::class, 'expired']);

Route::get('/', function () {
    return view('home_page');
})->name('home');

Route::view('/fitur', 'pages.fitur')->name('page.fitur');
Route::view('/harga', 'pages.harga')->name('page.harga');
Route::get('/blog', [PageController::class, 'index'])->name('blog');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('front.page');

Auth::routes();

Route::middleware('auth')->group(function(){

	Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
	Route::get('/myprofile', [ProfileController::class, 'index'])->name('myprofile');
	Route::put('/myprofile/update/{id}', [ProfileController::class, 'update'])->name('myprofile.update');

	Route::get('/member/soal' , [SoalController::class , 'index'])->name('member.soal');
	Route::get('/member/soal/{type}' , [TypeSoalController::class , 'index'])->name('member.soal.type');

	Route::get('/member/ujian/mulai/{exam}' , [UjianController::class , 'index'])->name('mulai-ujian');
	Route::get('/member/ujian/{exam}' , [UjianController::class , 'buat_event'])->name('member.buat_event');

	Route::get('/member/ujian/{exam}/{examevent}' , [UjianController::class , 'ujian'])->name('member.ujian');
	Route::get('/member/ujian/{exam}/{examevent}/{kolom}' , [UjianController::class , 'ujian_kolom'])->name('member.ujian-kolom');
	Route::get('/member/hasil-ujian/{examevent}', [UjianController::class,'hasil_ujian'])->name('member.hasil_ujian');
	Route::get('/member/hasil-ujian-umum/{examevent}', [UjianController::class,'hasil_ujian_umum'])->name('member.hasil_ujian_umum');


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
		Route::view('posts', 'livewire.posts.index')->middleware('auth')->name('admin.posts');

		Route::get('/posts/create', [PageController::class, 'create'])->name('posts.create');
		Route::post('/posts/create', [PageController::class, 'store'])->name('posts.store');
		Route::get('/posts/edit/{id}', [PageController::class, 'edit'])->name('posts.edit');
		Route::put('/posts/update/{id}', [PageController::class, 'update'])->name('posts.update');
		Route::get('setting', [SettingController::class, 'index'])->name('setting');
		Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

		Route::view('categories', 'livewire.categories.index')->middleware('auth')->name('admin.categories');
		Route::view('examevents', 'livewire.examevents.index')->name('examevents');
		Route::view('exam_events', 'livewire.exam-events.index');
		Route::view('transactions', 'livewire.transactions.index')->name('admin.transactions');
		Route::view('payment_methods', 'livewire.payment-methods.index')->name('admin.payment_methods');
		Route::view('users', 'livewire.users.index')->name('admin.users');
		Route::view('settings', 'livewire.settings.index')->name('admin.settings');
		Route::view('scores', 'livewire.scores.index')->name('admin.scores');
		Route::view('questions', 'livewire.questions.index')->name('admin.questions');
		Route::get('questions/{id}/update', [QuestionController::class, 'edit'])->name('admin.questions.update');
		

		Route::view('exams', 'livewire.exams.index')->name('admin.exams');
		Route::get('exams/create', [ExamController::class, 'create'])->name('admin.exams.create');
		Route::post('exams/store', [ExamController::class, 'store'])->name('admin.exams.store');
		Route::get('exams/edit/{id}', [ExamController::class, 'edit'])->name('admin.exams.edit');
		Route::put('exams/edit/{id}', [ExamController::class, 'update'])->name('admin.exams.update');
		Route::get('exams/soal/{id}', [PsikotesController::class, 'soal'])->name('admin.exam_soal');
		Route::get('tes-cermat/create' ,[PsikotesController::class, 'createCermat'])->name('admin.createCermat');
		Route::post('tes-cermat/create' ,[PsikotesController::class, 'storeCermat'])->name('admin.storeCermat');
		Route::post('tes-cermat/import' ,[PsikotesController::class, 'import'])->name('admin.cermat.import');

		Route::get('tes-cermat/{id}/{kolom?}' ,[PsikotesController::class, 'soalKecermatan'])->name('admin.tes-kecermatan');

		Route::post('/image-upload', [CkEditorController::class, 'upload'])->name('ckeditor.image-upload');

		// Route::get('/kirim-email', [MidtransController::class, 'sendMail']);


	});

});


