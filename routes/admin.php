
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CkEditorController;
use App\Http\Controllers\PsikotesController;
use App\Http\Controllers\QuestionController;
use App\Http\Livewire\Transactions\AksesUser;
use App\Http\Livewire\ExamTryOut;
use App\Http\Livewire\Transactions\OfflineRegistrations;


Route::middleware(['auth','admin'])->group(function(){

    //Route Hooks - Do not delete//
    // Route::view('downloads', 'livewire.downloads.index')->middleware('auth')->name('admin.downloads');
    // Route::view('examcategory', 'livewire.examcategories.index')->middleware('auth')->name('admin.examcategory');
    // Route::view('confirmations', 'livewire.confirmations.index')->middleware('auth')->name('admin.confirmations');		
    // Route::get('packages', [PackageController::class, 'index'])->middleware('auth')->name('admin.packages');
    // Route::get('packages/create', [PackageController::class, 'create'])->middleware('auth')->name('admin.packages.create');
    // Route::get('packages/edit/{id}', [PackageController::class, 'edit'])->middleware('auth')->name('admin.packages.edit');
    // Route::view('posts', 'livewire.posts.index')->middleware('auth')->name('admin.posts');

    // Route::get('/posts/create', [PageController::class, 'create'])->name('posts.create');
    // Route::post('/posts/create', [PageController::class, 'store'])->name('posts.store');
    // Route::get('/posts/edit/{id}', [PageController::class, 'edit'])->name('posts.edit');
    // Route::put('/posts/update/{id}', [PageController::class, 'update'])->name('posts.update');
    // Route::get('setting', [SettingController::class, 'index'])->name('setting');
    // Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

    // Route::view('categories', 'livewire.categories.index')->middleware('auth')->name('admin.categories');
    // Route::view('examevents', 'livewire.examevents.index')->name('examevents');
    // Route::view('exam_events', 'livewire.exam-events.index');
    // Route::view('transactions', 'livewire.transactions.index')->name('admin.transactions');
    // Route::get('transaction/akses-user/{transaction}', AksesUser::class)->name('admin.transactions.akses_user');

    // Route::get('offline-registration', OfflineRegistrations::class)->name('admin.offline-registrations');


    // Route::view('payment_methods', 'livewire.payment-methods.index')->name('admin.payment_methods');
    // Route::view('users', 'livewire.users.index')->name('admin.users');
    // Route::view('settings', 'livewire.settings.index')->name('admin.settings');
    // Route::view('scores', 'livewire.scores.index')->name('admin.scores');
    // Route::view('questions', 'livewire.questions.index')->name('admin.questions');
    // Route::get('questions/{id}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
    // Route::put('questions/{id}/update', [QuestionController::class, 'update'])->name('admin.questions.update');
    // Route::post('questions/hapus-gambar', [QuestionController::class, 'hapus_gambar'])->name('admin.questions.hapus_gambar');


    // Route::view('exams', 'livewire.exams.index')->name('admin.exams');
    // Route::get('exams/create', [ExamController::class, 'create'])->name('admin.exams.create');
    // Route::post('exams/store', [ExamController::class, 'store'])->name('admin.exams.store');
    // Route::get('exams/edit/{id}', [ExamController::class, 'edit'])->name('admin.exams.edit');
    // Route::put('exams/edit/{id}', [ExamController::class, 'update'])->name('admin.exams.update');
    // Route::get('exams/soal/{id}', [PsikotesController::class, 'soal'])->name('admin.exam_soal');
    // Route::get('tes-cermat/create' ,[PsikotesController::class, 'createCermat'])->name('admin.createCermat');
    // Route::post('tes-cermat/create' ,[PsikotesController::class, 'storeCermat'])->name('admin.storeCermat');
    // Route::post('tes-cermat/import' ,[PsikotesController::class, 'import'])->name('admin.cermat.import');

    // // list soal tryout
    // Route::get('soal-tryout', ExamTryOut::class)->name('admin.soal-tryout');


    // Route::get('tes-cermat/{id}/{kolom?}' ,[PsikotesController::class, 'soalKecermatan'])->name('admin.tes-kecermatan');

    // Route::post('/image-upload', [CkEditorController::class, 'upload'])->name('ckeditor.image-upload');


});