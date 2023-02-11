<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kepribadian, Kecerdasan, Sikap kerja, Matemateika dll.
            $table->string('type'); // PG,Column
            $table->timestamps();
        });


        Schema::table('exams', function (Blueprint $table) {

            $table->foreignId('exam_category_id')->nullable()->constrained('exam_categories');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('exams', function (Blueprint $table) {

            $table->dropConstrainedForeignId('exam_category_id');

        });


        Schema::dropIfExists('exam_categories');
    }
}
