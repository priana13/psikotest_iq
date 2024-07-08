<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Norma\QuizController;
use App\Http\Controllers\Norma\TestController;
use App\Http\Controllers\Norma\ReportController;

/*
	/*-- Norma Test ---*/
	Route::get('/test' , [TestController::class , 'index'])->name('norma.test');
	// Route::get('/test/main' , [TestController::class , 'main'])->name('norma.test.main');
	// Route::get('/test/kesatu' , [TestController::class , 'kesatu'])->name('norma.test.kesatu');
	// Route::get('/test/kedua' , [TestController::class , 'kedua'])->name('norma.test.kedua');
	// Route::get('/test/ketiga' , [TestController::class , 'ketiga'])->name('norma.test.ketiga');
	// Route::get('/test/keempat' , [TestController::class , 'keempat'])->name('norma.test.keempat');
	// Route::get('/test/kelima' , [TestController::class , 'kelima'])->name('norma.test.kelima');
	// Route::get('/test/keenam' , [TestController::class , 'keenam'])->name('norma.test.keenam');
	// Route::get('/test/ketujuh' , [TestController::class , 'ketujuh'])->name('norma.test.ketujuh');
	// Route::get('/test/kedelapan' , [TestController::class , 'kedelapan'])->name('norma.test.kedelapan');
	// Route::get('/test/kesembilan' , [TestController::class , 'kesembilan'])->name('norma.test.kesembilan');

	Route::get('/test/petunjuk' , [TestController::class , 'petunjuk'])->name('norma.test.petunjuk');

	Route::middleware('auth')->group(function(){

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
 


	});

});


