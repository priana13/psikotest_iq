<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examevents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->integer('salah')->nullable();
            $table->integer('nilai')->nullable();
            $table->integer('benar')->nullable();
            $table->integer('sisa_waktu')->nullable();
            $table->string('status',20)->default('Belum Selesai');
            $table->timestamps();
        });

        Schema::table('exam_items' , function(Blueprint $table){
            $table->foreignId('examevent_id')->constrained('examevents')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examevents');

        Schema::table('exam_items' , function(Blueprint $table){
            $table->dropConstrainedForeignId('exam_event_id');
        });


    }
}
