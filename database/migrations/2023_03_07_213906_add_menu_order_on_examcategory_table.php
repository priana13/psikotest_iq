<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMenuOrderOnExamcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('examcategory', function (Blueprint $table) {

            $table->integer('menu_order')->after('icon')->default(1);

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::table('examcategory', function (Blueprint $table) {

            $table->dropColumn('menu_order');

        });

    }
}
