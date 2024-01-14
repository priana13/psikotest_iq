<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KunciNorma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('kunci_norma', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe_usia',['A','B','C','D','E','F','G','H','I','J','K','L','M']);    
            $table->integer('rw');
            $table->integer('se');
            $table->integer('wa');
            $table->integer('an');
            $table->integer('ge');
            $table->integer('ra');
            $table->integer('zr');
            $table->integer('fa');
            $table->integer('wu');
            $table->integer('me');           
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
        Schema::dropIfExists('kunci_norma'); 
    }
}
