<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNilaiToTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tryouts', function (Blueprint $table) {
            $table->integer('nilai')->nullable();
            $table->string('status' , 50)->default("Aktif");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tryouts', function (Blueprint $table) {
            $table->dropColumn('nilai');
            $table->dropColumn('status');
        });
    }
}
