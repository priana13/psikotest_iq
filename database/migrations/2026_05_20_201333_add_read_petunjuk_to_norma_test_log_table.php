<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadPetunjukToNormaTestLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('norma_test_log', function (Blueprint $table) {
            $table->string('read_petunjuk',20)->nullable(); // Ready, Belum, Sudah
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('norma_test_log', function (Blueprint $table) {
            $table->dropColumn('read_petunjuk');
        });
    }
}
