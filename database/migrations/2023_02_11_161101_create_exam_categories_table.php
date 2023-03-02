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
        Schema::create('examcategory', function (Blueprint $table) {
            $table->id();
            $table->string('name',100); // Kepribadian, Kecerdasan, Sikap kerja, Matemateika dll.
            $table->string('type',10); // PG,Column
            $table->string('exam_type',20);//Psikotes,Akademik,Leadership,Potensi Diri, IQ
            $table->string('icon',20)->nullable();
            $table->timestamps();
        });


        Schema::table('exams', function (Blueprint $table) {

            $table->foreignId('examcategory_id')->nullable()->constrained('examcategory');

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

            $table->dropConstrainedForeignId('examcategory_id');

        });


        Schema::dropIfExists('examcategory');
    }
}
