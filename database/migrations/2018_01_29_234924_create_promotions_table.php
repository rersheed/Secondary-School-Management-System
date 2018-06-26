<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('id');
            $table->string('remark')->nullable();
            $table->integer('student_id')->unsigned();
            $table->integer('year_group_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->primary(['student_id','year_group_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
