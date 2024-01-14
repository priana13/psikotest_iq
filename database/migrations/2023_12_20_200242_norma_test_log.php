<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NormaTestLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('norma_test_log', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nomor_test');
            $table->integer('test_id');    // norma id        
            $table->string('waktu_test')->nullable();
            $table->string('waktu_mulai')->nullable(); 
            $table->string('waktu_selesai')->nullable(); 
            $table->integer('status'); 
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
        Schema::dropIfExists('norma_test_log'); 
    }
}
