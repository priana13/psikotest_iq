<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizGe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_ge', function (Blueprint $table) {
            $table->id();            
            $table->integer('test_id')->nullable();
            $table->integer('no')->nullable();
            $table->text('quiz')->nullable();            
            $table->string('k1')->nullable();
            $table->string('k2')->nullable();            
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
        Schema::dropIfExists('quiz_ge'); 

       
    }
}
