<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPangkatToUserNormaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_norma', function (Blueprint $table) {
            $table->string('nama')->after('user_id');
            $table->string('pangkat')->nullable()->after('pendidikan');
            $table->integer('usia')->nullable()->after('tgl_lahir');
            $table->integer('angkatan_tahun')->nullable()->after('instansi');
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
            $table->dropColumn('pangkat');
            $table->dropColumn('usia');
            $table->dropColumn('angkatan_tahun');            
            $table->dropColumn('nama');
        });
    }
}
