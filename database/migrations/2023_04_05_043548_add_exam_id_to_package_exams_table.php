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

            $table->foreignId('exam_id')->nullable()->constrained('exams');

        });

        Schema::table('memberships', function (Blueprint $table) {

            $table->foreignId('package_id')->nullable()->constrained('packages');

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
