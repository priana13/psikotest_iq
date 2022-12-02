<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('type',20);
            $table->string('name');
            $table->integer('qty'); // qty bulan
            $table->integer('price');
            $table->text('detail')->nullable();
            $table->timestamps();
        });

        Schema::table('transactions' , function (Blueprint $table){

            $table->foreignId('package_id')->constrained('packages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');

        Schema::table('transactions' , function (){

            $table->dropForeign('transactions_package_id_foreign');

        });


        
    }
}
