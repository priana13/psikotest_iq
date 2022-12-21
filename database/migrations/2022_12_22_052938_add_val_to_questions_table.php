<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->integer('val_a')->nullable();
            $table->integer('val_b')->nullable();
            $table->integer('val_c')->nullable();
            $table->integer('val_d')->nullable();
            $table->integer('val_e')->nullable(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            
            $table->dropColumn('val_a');
            $table->dropColumn('val_b');
            $table->dropColumn('val_c');
            $table->dropColumn('val_d');
            $table->dropColumn('val_e'); 


        });
    }
}
