<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsTryoutToExameventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examevents', function (Blueprint $table) {
            $table->boolean('is_tryout')->default(false);
            $table->string('kode_tryout')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examevents', function (Blueprint $table) {
            $table->dropColumn('is_tryout');
            $table->dropColumn('kode_tryout');
        });
    }
}
