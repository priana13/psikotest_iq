<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kota',100);
            $table->string('provinsi_id')->nullable();
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
           
            $table->string('kota',100)->after('alamat');
           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kota');

        Schema::table('users', function (Blueprint $table) {
           
            $table->dropColumn('kota');
           
        });


    }
}
