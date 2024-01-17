<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Norma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('norma', function (Blueprint $table) {
            $table->id(); // this is test_id
            $table->enum('tipe',[1,2,3,4,5,6,7,8,9,10]);                     
            $table->string('nama');
            $table->string('waktu');
            $table->string('nilai_min');        
            $table->text('petunjuk_kesatu');  
            $table->text('petunjuk_kedua');      
            $table->string('file_petunjuk');              
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
        Schema::dropIfExists('norma'); 
    }
}
