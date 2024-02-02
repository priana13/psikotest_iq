<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMintaToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('minta')->nullable(); // nullable
            $table->string('jenis_kelamin', 20)->nullable(); // L / P
            $table->string('lokasi_test')->default('online'); // online, offline
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('minat');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('lokasi_test');
        });
    }
}
