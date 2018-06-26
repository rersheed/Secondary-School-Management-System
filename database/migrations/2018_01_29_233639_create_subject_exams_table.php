<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->date('exam_date');
            $table->time('start_time');
            $table->double('duration');
            $table->integer('exam_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_exams');
    }
}
