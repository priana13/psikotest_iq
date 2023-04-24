<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamIdToExameventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examevents', function (Blueprint $table) {
            $table->foreignId('exam_id')->after('type')->nullable()->constrained('exams');

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
            $table->dropConstrainedForeignId('exam_id');
        });
    }
}
