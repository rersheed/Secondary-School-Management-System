<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_results', function (Blueprint $table) {
            $table->integer('total_score');
            $table->integer('position');
            $table->integer('student_id')->unsigned();
            $table->integer('year_group_id')->unsigned();
            $table->integer('term_id')->unsigned();
            $table->timestamps();
            $table->primary(['student_id', 'year_group_id', 'term_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_results');
    }
}
