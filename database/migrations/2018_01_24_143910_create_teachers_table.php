<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('othernames');
            $table->date('dateOfBirth');
            $table->string('placeOfBirth');
            $table->integer('sex');
            $table->string('phone');
            $table->string('stateOfOrigin');
            $table->string('lga');
            $table->text('address');
            $table->date('dateOfHiring');
            $table->string('specialty');
            $table->boolean('is_active')->default(true);
            $table->double('salary');
            $table->softDeletes();
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
        Schema::dropIfExists('teachers');
    }
}
