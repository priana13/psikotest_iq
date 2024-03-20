<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserIdToNullOnTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            
            $table->foreignId('user_id')->nullable()->change();
            $table->integer('total')->nullable()->change();
            $table->string('minat')->nullable();
            $table->string('jenis_kelamin',5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {

            $table->foreignId('user_id')->change();
            $table->integer('total')->change();
            $table->dropColumn('minat');
            $table->dropColumn('jenis_kelamin');

        });
    }
}
