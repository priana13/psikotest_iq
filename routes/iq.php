<?php

use App\Http\Controllers\Norma\BiodataController;
use App\Http\Controllers\Norma\PetunjukController;
use App\Http\Controllers\Norma\QuizController;
use App\Http\Controllers\Norma\RekapDataController;
use App\Http\Controllers\Norma\ReportController;
use App\Http\Livewire\Norma\GenerateUser;
use App\Http\Livewire\Norma\Report\HasilNormaTest;
use App\Http\Livewire\Norma\Report\RekapList;
use App\Http\Livewire\Norma\Test\MainNorma;
use Illuminate\Support\Facades\Route;

	Route::middleware('auth')->group(function(){
		/*
	/*-- Norma Test ---*/
	Route::view('/iq/welcome' , 'test-iq.welcome')->name('norma.test.welcome');
	Route::get('/iq/biodata' , [BiodataController::class, 'index'])->name('norma.test.biodata');
	Route::post('/iq/biodata' , [BiodataController::class, 'store'])->name('norma.test.biodata.store');

	// petunjuk
	Route::get('/iq/petunjuk' , [PetunjukController::class , 'index'])->name('norma.test.petunjuk');

	Route::get('/test' , MainNorma::class)->name('norma.test');

	Route::middleware('admin')->group(function(){	


		Route::get('/quiz/dashboard' , [QuizController::class , 'dashboard'])->name('norma.quiz.dashboard');
	
		Route::view('/quiz/se' , 'livewire.norma.quiz.se.index')->name('norma.quiz.se');
		Route::get('/quiz/wa' , [QuizController::class , 'wa'])->name('norma.quiz.wa');
		Route::get('/quiz/an' , [QuizController::class , 'an'])->name('norma.quiz.an');
		Route::get('/quiz/ge' , [QuizController::class , 'ge'])->name('norma.quiz.ge');
		Route::get('/quiz/ra' , [QuizController::class , 'ra'])->name('norma.quiz.ra');
		Route::get('/quiz/zr' , [QuizController::class , 'zr'])->name('norma.quiz.zr');
		Route::get('/quiz/fa' , [QuizController::class , 'fa'])->name('norma.quiz.fa');
		Route::get('/quiz/wu' , [QuizController::class , 'wu'])->name('norma.quiz.wu');
		Route::get('/quiz/mind' , [QuizController::class , 'mind'])->name('norma.quiz.mind');
		Route::get('/quiz/me' , [QuizController::class , 'me'])->name('norma.quiz.me');
		Route::get('/report/rekap' , RekapList::class)->name('norma.report.rekap');	
		Route::get('/report/norma-test/{user}' , HasilNormaTest::class)->name('norma.report.detail');

		Route::get('/report/rekap-biodata' , [RekapDataController::class , 'rekapBiodata'])->name('norma.report.rekap-biodata');	


		Route::view('users', 'livewire.users.index')->name('admin.users');

		Route::get('/generate-user', GenerateUser::class)->name('generate-user');


	});

});


