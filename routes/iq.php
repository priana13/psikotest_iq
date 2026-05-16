<?php

use App\Http\Controllers\Norma\BiodataController;
use App\Http\Controllers\Norma\PetunjukController;
use App\Http\Controllers\Norma\QuizController;
use App\Http\Controllers\Norma\ReportController;
use App\Http\Controllers\Norma\TestController;
use App\Http\Livewire\Norma\GenerateUser;
use App\Http\Livewire\Norma\Report\HasilNormaTest;
use Illuminate\Support\Facades\Route;

	Route::middleware('auth')->group(function(){
		/*
	/*-- Norma Test ---*/
	Route::view('/iq/welcome' , 'test-iq.welcome')->name('norma.test.welcome');
	Route::get('/iq/biodata' , [BiodataController::class, 'index'])->name('norma.test.biodata');
	Route::post('/iq/biodata' , [BiodataController::class, 'store'])->name('norma.test.biodata.store');

	// petunjuk
	Route::get('/iq/petunjuk' , [PetunjukController::class , 'index'])->name('norma.test.petunjuk');

	Route::get('/test' , [TestController::class , 'index'])->name('norma.test');

	// Route::get('/test/petunjuk' , [TestController::class , 'petunjuk'])->name('norma.test.petunjuk');		

	Route::middleware('admin')->group(function(){	


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
		Route::get('/report/norma-test/{user}' , HasilNormaTest::class)->name('norma.report.detail');

		Route::get('/generate-user', GenerateUser::class)->name('generate-user');


	});

});


