<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Member\SoalController;
use App\Http\Controllers\HalamanHargaController;
use App\Http\Controllers\Member\UjianController;
use App\Http\Controllers\TryOut\TryOutController;
use App\Http\Controllers\TrialPsikotestController;
use App\Http\Controllers\Member\TypeSoalController;
use App\Http\Livewire\Member\HasilTest\HasilTryOut;
use App\Http\Livewire\Member\HasilTest\TableHasilTryOut;
use App\Http\Controllers\Offline\PesertaOfflineController;
use App\Http\Livewire\Member\UjianKolomBaru;

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

Route::redirect('/', 'login')->name('home');

// Route::get('/sitemap.xml', [SeoController::class,'index'])->name('sitemap');


// Route::view('/fitur', 'pages.fitur')->name('page.fitur');
// Route::get('/harga', [HalamanHargaController::class, 'index'])->name('page.harga');
// Route::get('/blog', [PageController::class, 'index'])->name('blog');
// Route::get('/page/{slug}', [PageController::class, 'show'])->name('front.page');
// Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category');

// Route::prefix('offline')->group(function(){

// 	Route::get('registrasi', [PesertaOfflineController::class, 'registrasi'])->name('offline.registrasi');
// 	Route::post('registrasi', [PesertaOfflineController::class, 'store'])->name('offline.registrasi.store');
// 	Route::get('pembayaran/{transaction}', [PesertaOfflineController::class, 'pembayaran'])->name('offline.pembayaran');

// });

// Route::get('/halaman-download' , [DownloadController::class, 'index'])->name('download');
// Route::get('/halaman-download/{download}' , [DownloadController::class, 'download'])->name('download.file');


// Route::prefix('coba')->group(function(){

// 	Route::get('ujian/mulai/{exam}', [TrialPsikotestController::class , 'index'])->name('coba.mulai_ujian');
// 	Route::get('/ujian/{exam}' , [TrialPsikotestController::class , 'buat_event'])->name('coba.buat_event');

// 	Route::get('/ujian/{exam}/{examevent}/{kolom}' , [TrialPsikotestController::class , 'ujian_kolom'])->name('coba.ujian-kolom');
	
// 	Route::get('/member/ujian/{exam}/{examevent}/{kolom}' , [TrialPsikotestController::class , 'ujian_kolom'])->name('coba.ujian-kolom');

// });

Auth::routes();

Route::middleware('auth')->group(function(){

// 	Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
// 	Route::get('/dashboard/subtes', [HomeController::class, 'subtes'])->name('dashboard.subtes');

	Route::get('/myprofile', [ProfileController::class, 'index'])->name('myprofile');
	Route::put('/myprofile/update/{id}', [ProfileController::class, 'update'])->name('myprofile.update');

// 	Route::get('/member/soal' , [SoalController::class , 'index'])->name('member.soal');
// 	Route::get('/member/soal/{type}' , [TypeSoalController::class , 'index'])->name('member.soal.type');

// 	Route::get('/member/ujian/mulai/{exam}' , [UjianController::class , 'index'])->name('mulai-ujian');
// 	Route::get('/member/ujian/{exam}' , [UjianController::class , 'buat_event'])->name('member.buat_event');

// 	Route::get('/member/ujian/{exam}/{examevent}' , [UjianController::class , 'ujian'])->name('member.ujian');

// 	Route::get('/member/ujian/{exam}/{examevent}/{kolom}' , [UjianController::class , 'ujian_kolom'])->name('member.ujian-kolom');

// 	// ujian kolom baru
// 	Route::get('/member/ujian-baru/{exam}/{examEvent}/{kolom}', UjianKolomBaru::class)->name('member.ujian-kolom-baru');

// 	Route::get('/member/hasil-ujian/{examevent}', [UjianController::class,'hasil_ujian'])->name('member.hasil_ujian');
// 	Route::get('/member/hasil-ujian-umum/{examevent}', [UjianController::class,'hasil_ujian_umum'])->name('member.hasil_ujian_umum');
// 	Route::get('/member/hasil-ujian-detail/{examevent}', [UjianController::class,'hasil_ujian_detail'])->name('member.hasil_ujian_detail');


// 	// Try oute
// 	Route::get('/tryout/test', [TryOutController::class, 'start'])->name('tryout.start');
// 	Route::get('/tryout/create', [TryOutController::class, 'create'])->name('tryout.create');
// 	Route::get('/tryout/hasil/{tryout:kode_tryout}', HasilTryOut::class)->name('tryout.hasil');
// 	Route::get('/tryout/table', TableHasilTryOut::class)->name('tryout.table');


// 	Route::view('member/history', 'livewire.examevents.index')->name('member.history');
// 	// checkout
// 	Route::get('/checkout' , [CheckoutController::class , 'index'])->name('checkout');
// 	Route::get('/checkout/thanks/{id}' , [CheckoutController::class , 'thanks'])->name('checkout.thanks');
// 	Route::get('/checkout/konfirmasi/{code}' , [CheckoutController::class , 'konfirmasi'])->name('checkout.konfirmasi');
// 	Route::post('/checkout/konfirmasi' , [CheckoutController::class , 'storeKonfirmasi'])->name('store_konfirmasi');
// 	Route::view('memberships', 'livewire.memberships.index')->middleware('auth')->name('admin.memberships');

	
});


