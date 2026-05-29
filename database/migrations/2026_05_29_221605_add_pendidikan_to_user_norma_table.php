<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPendidikanToUserNormaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_norma', function (Blueprint $table) {
            $table->string('bidang_studi')->nullable()->after('tgl_lahir');
            $table->string('jenis_kelamin')->nullable()->after('bidang_studi');
            $table->string('status')->default("Selesai"); // Pending;Selesai

            // tambahkan kolom pendidikan jika belum ada
            if(!Schema::hasColumn('user_norma', 'pendidikan')) {
                $table->string('pendidikan')->nullable()->after('jenis_kelamin');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_norma', function (Blueprint $table) {
            $table->dropColumn('bidang_studi');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('status');
        });
    }
}
