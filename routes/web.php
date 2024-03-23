<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CkEditorController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PsikotesController;
use App\Http\Controllers\QuestionController;
use App\Http\Livewire\Transactions\AksesUser;
use App\Http\Controllers\Norma\QuizController;
use App\Http\Controllers\Norma\TestController;
use App\Http\Controllers\Member\SoalController;
use App\Http\Controllers\HalamanHargaController;
use App\Http\Controllers\Member\UjianController;
use App\Http\Controllers\Norma\ReportController;
use App\Http\Controllers\TrialPsikotestController;
use App\Http\Controllers\Member\TypeSoalController;
use App\Http\Controllers\Offline\PesertaOfflineController;
use App\Http\Controllers\TryOut\TryOutController;
use App\Http\Livewire\Transactions\OfflineRegistrations;

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

Route::get('/sitemap.xml', [SeoController::class,'index'])->name('sitemap');


Route::view('/fitur', 'pages.fitur')->name('page.fitur');
Route::get('/harga', [HalamanHargaController::class, 'index'])->name('page.harga');
Route::get('/blog', [PageController::class, 'index'])->name('blog');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('front.page');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category');

Route::prefix('offline')->group(function(){

	Route::get('registrasi', [PesertaOfflineController::class, 'registrasi'])->name('offline.registrasi');
	Route::post('registrasi', [PesertaOfflineController::class, 'store'])->name('offline.registrasi.store');
	Route::get('pembayaran/{transaction}', [PesertaOfflineController::class, 'pembayaran'])->name('offline.pembayaran');

});

Route::prefix('coba')->group(function(){

	Route::get('ujian/mulai/{exam}', [TrialPsikotestController::class , 'index'])->name('coba.mulai_ujian');
	Route::get('/ujian/{exam}' , [TrialPsikotestController::class , 'buat_event'])->name('coba.buat_event');

	Route::get('/ujian/{exam}/{examevent}/{kolom}' , [TrialPsikotestController::class , 'ujian_kolom'])->name('coba.ujian-kolom');
	
	Route::get('/member/ujian/{exam}/{examevent}/{kolom}' , [TrialPsikotestController::class , 'ujian_kolom'])->name('coba.ujian-kolom');

});

Auth::routes();

Route::middleware('auth')->group(function(){

	Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
	Route::get('/dashboard/subtes', [HomeController::class, 'subtes'])->name('dashboard.subtes');

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
	Route::get('/member/hasil-ujian-detail/{examevent}', [UjianController::class,'hasil_ujian_detail'])->name('member.hasil_ujian_detail');


	// Try oute
	Route::get('/tryout/test', [TryOutController::class, 'start'])->name('tryout.start');


	Route::view('member/history', 'livewire.examevents.index')->name('member.history');
	// checkout
	Route::get('/checkout' , [CheckoutController::class , 'index'])->name('checkout');
	Route::get('/checkout/thanks/{id}' , [CheckoutController::class , 'thanks'])->name('checkout.thanks');
	Route::get('/checkout/konfirmasi/{code}' , [CheckoutController::class , 'konfirmasi'])->name('checkout.konfirmasi');
	Route::post('/checkout/konfirmasi' , [CheckoutController::class , 'storeKonfirmasi'])->name('store_konfirmasi');
	Route::view('memberships', 'livewire.memberships.index')->middleware('auth')->name('admin.memberships');

	/*-- Norma Test ---*/
	Route::get('/test' , [TestController::class , 'index'])->name('norma.test');
	Route::get('/test/main' , [TestController::class , 'main'])->name('norma.test.main');
	Route::get('/test/kesatu' , [TestController::class , 'kesatu'])->name('norma.test.kesatu');
	Route::get('/test/kedua' , [TestController::class , 'kedua'])->name('norma.test.kedua');
	Route::get('/test/ketiga' , [TestController::class , 'ketiga'])->name('norma.test.ketiga');
	Route::get('/test/keempat' , [TestController::class , 'keempat'])->name('norma.test.keempat');
	Route::get('/test/kelima' , [TestController::class , 'kelima'])->name('norma.test.kelima');
	Route::get('/test/keenam' , [TestController::class , 'keenam'])->name('norma.test.keenam');
	Route::get('/test/ketujuh' , [TestController::class , 'ketujuh'])->name('norma.test.ketujuh');
	Route::get('/test/kedelapan' , [TestController::class , 'kedelapan'])->name('norma.test.kedelapan');
	Route::get('/test/kesembilan' , [TestController::class , 'kesembilan'])->name('norma.test.kesembilan');

	Route::get('/test/petunjuk' , [TestController::class , 'petunjuk'])->name('norma.test.petunjuk');


	Route::middleware('admin')->group(function(){

		//Route Hooks - Do not delete//
		Route::view('examcategory', 'livewire.examcategories.index')->middleware('auth')->name('admin.examcategory');
		Route::view('confirmations', 'livewire.confirmations.index')->middleware('auth')->name('admin.confirmations');		
		Route::get('packages', [PackageController::class, 'index'])->middleware('auth')->name('admin.packages');
		Route::get('packages/create', [PackageController::class, 'create'])->middleware('auth')->name('admin.packages.create');
		Route::get('packages/edit/{id}', [PackageController::class, 'edit'])->middleware('auth')->name('admin.packages.edit');
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
		Route::get('transaction/akses-user/{transaction}', AksesUser::class)->name('admin.transactions.akses_user');

		Route::get('offline-registration', OfflineRegistrations::class)->name('admin.offline-registrations');
		
		
		Route::view('payment_methods', 'livewire.payment-methods.index')->name('admin.payment_methods');
		Route::view('users', 'livewire.users.index')->name('admin.users');
		Route::view('settings', 'livewire.settings.index')->name('admin.settings');
		Route::view('scores', 'livewire.scores.index')->name('admin.scores');
		Route::view('questions', 'livewire.questions.index')->name('admin.questions');
		Route::get('questions/{id}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
		Route::put('questions/{id}/update', [QuestionController::class, 'update'])->name('admin.questions.update');
		Route::post('questions/hapus-gambar', [QuestionController::class, 'hapus_gambar'])->name('admin.questions.hapus_gambar');
		

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


		Route::get('/quiz/dashboard' , [QuizController::class , 'dashboard'])->name('norma.quiz.dashboard');
	
		Route::get('/quiz/se' , [QuizController::class , 'se'])->name('norma.quiz.se');
		Route::get('/quiz/se/list' , [QuizController::class , 'seList'])->name('norma.quiz.se.list');
		Route::get('/quiz/se/show' , [QuizController::class , 'seShow'])->name('norma.quiz.se.show');

		Route::get('/quiz/wa' , [QuizController::class , 'wa'])->name('norma.quiz.wa');
		Route::get('/quiz/wa/list' , [QuizController::class , 'waList'])->name('norma.quiz.wa.list');
		Route::get('/quiz/wa/show' , [QuizController::class , 'waShow'])->name('norma.quiz.wa.show');

		Route::get('/quiz/an' , [QuizController::class , 'an'])->name('norma.quiz.an');
		Route::get('/quiz/an/list' , [QuizController::class , 'anList'])->name('norma.quiz.an.list');
		Route::get('/quiz/an/show' , [QuizController::class , 'anShow'])->name('norma.quiz.an.show');

		Route::get('/quiz/ge' , [QuizController::class , 'ge'])->name('norma.quiz.ge');
		Route::get('/quiz/ge/list' , [QuizController::class , 'geList'])->name('norma.quiz.ge.list');
		Route::get('/quiz/ge/show' , [QuizController::class , 'geShow'])->name('norma.quiz.ge.show');

		Route::get('/quiz/ra' , [QuizController::class , 'ra'])->name('norma.quiz.ra');
		Route::get('/quiz/ra/list' , [QuizController::class , 'raList'])->name('norma.quiz.ra.list');
		Route::get('/quiz/ra/show' , [QuizController::class , 'raShow'])->name('norma.quiz.ra.show');

		Route::get('/quiz/zr' , [QuizController::class , 'zr'])->name('norma.quiz.zr');
		Route::get('/quiz/zr/list' , [QuizController::class , 'zrList'])->name('norma.quiz.zr.list');
		Route::get('/quiz/zr/show' , [QuizController::class , 'zrShow'])->name('norma.quiz.zr.show');

		Route::get('/quiz/fa' , [QuizController::class , 'fa'])->name('norma.quiz.fa');
		Route::get('/quiz/fa/list' , [QuizController::class , 'faList'])->name('norma.quiz.fa.list');
		Route::get('/quiz/fa/show' , [QuizController::class , 'faShow'])->name('norma.quiz.fa.show');

		Route::get('/quiz/wu' , [QuizController::class , 'wu'])->name('norma.quiz.wu');
		Route::get('/quiz/wu/list' , [QuizController::class , 'wuList'])->name('norma.quiz.wu.list');
		Route::get('/quiz/wu/show' , [QuizController::class , 'wuShow'])->name('norma.quiz.wu.show');

		Route::get('/quiz/mind' , [QuizController::class , 'mind'])->name('norma.quiz.mind');
		Route::get('/quiz/mind/list' , [QuizController::class , 'mindList'])->name('norma.quiz.mind.list');
		Route::get('/quiz/mind/show' , [QuizController::class , 'mindShow'])->name('norma.quiz.mind.show');

		Route::get('/quiz/me' , [QuizController::class , 'me'])->name('norma.quiz.me');
		Route::get('/quiz/me/list' , [QuizController::class , 'meList'])->name('norma.quiz.me.list');
		Route::get('/quiz/me/show' , [QuizController::class , 'meShow'])->name('norma.quiz.me.show');	

		Route::get('/report/rekap' , [ReportController::class , 'rekap'])->name('norma.report.rekap');	
		Route::get('/report/rekap/list' , [ReportController::class , 'rekapList'])->name('norma.report.rekap.list');
 


	});

});


