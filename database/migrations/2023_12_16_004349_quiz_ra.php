<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizRa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_ra', function (Blueprint $table) {
            $table->id();            
            $table->integer('test_id')->nullable();
            $table->integer('no')->nullable();
            $table->text('quiz')->nullable();            
            $table->string('k')->nullable();            
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
        Schema::dropIfExists('quiz_ra'); 

       
    }
}
