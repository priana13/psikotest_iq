<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempExampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examevent_id')->constrained('examevents')->cascadeOnDelete();
            $table->integer('waktu_terakhir');
            $table->integer('soal_terakhir');
            $table->string('kolom_terakhir')->nullable();
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
        Schema::dropIfExists('temp_exams');
    }
}
