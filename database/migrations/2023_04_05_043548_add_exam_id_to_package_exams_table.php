<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamIdToPackageExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::table('package_exams', function (Blueprint $table) {

            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');

        });

        Schema::table('memberships', function (Blueprint $table) {

            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_exams', function (Blueprint $table) {
            $table->dropConstrainedForeignId('exam_id');
        });

        Schema::table('memberships', function (Blueprint $table) {

            $table->dropConstrainedForeignId('package_id');

        });
    }
}
