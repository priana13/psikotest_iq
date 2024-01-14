<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataUserNorma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_norma', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nomor_test');
            $table->date('tgl_lahir')->nullable(); // Change to date or datetime
            $table->string('pendidikan')->nullable();
            $table->string('instansi')->nullable(); // Change to string or text
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
        Schema::dropIfExists('user_norma'); 

    }
}
