<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTryoutExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tryout_exams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kecerdasan , Kepribadian , Sikap Kerja
            $table->unsignedBigInteger('exam_id');
            $table->integer('petunjuk_timmer')->default(60);

            $table->foreign('exam_id')->references('id')->on('exams')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tryout_exams');
    }
}
