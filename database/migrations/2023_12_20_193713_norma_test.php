<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NormaTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('norma_test', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('test_id');    // norma id          
            $table->integer('quiz_id')->nullable();
            $table->string('k')->nullable(); 
            $table->string('j')->nullable();     
            $table->string('nilai')->nullable();             
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
        Schema::dropIfExists('norma_test'); 
    }
}
