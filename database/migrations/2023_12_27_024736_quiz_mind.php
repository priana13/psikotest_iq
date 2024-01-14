<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizMind extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_mind', function (Blueprint $table) {
            $table->id();            
            $table->integer('test_id')->nullable();                     
            $table->string('quiz')->nullable();
            $table->string('uraian')->nullable();                         
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
        Schema::dropIfExists('quiz_mind'); 

       
    }
}
