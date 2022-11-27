<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_columns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams');
            $table->string('kolom');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('e')->nullable();
            $table->integer('waktu')->nullable();
            $table->timestamps();
        });

        Schema::table('questions',function(Blueprint $table){
            $table->foreignId('exam_column_id')->nullable()->constrained('exam_columns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_columns');

        Schema::table('questions',function(Blueprint $table){
            $table->dropConstrainedForeignId('exam_column_id');

        });


    }
}
