<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KunciIq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('kunci_iq', function (Blueprint $table) {
            $table->id();           
            $table->integer('rw');
            $table->integer('a');
            $table->integer('b');
            $table->integer('c');
            $table->integer('d');
            $table->integer('e');
            $table->integer('f');
            $table->integer('g');
            $table->integer('h');
            $table->integer('i');     
            $table->integer('j');
            $table->integer('k');
            $table->integer('l');
            $table->integer('m');      
            $table->integer('iq');
            $table->string('kategori');
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
        Schema::dropIfExists('kunci_iq'); 
    }
}
