<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            // regNumber","surname","othernames","sex","birthDate","phone","lastSchool","admissionDate","class_id","guardianName","guardianPhone","relationship","state","lga","address","image"
            $table->increments('id');
            $table->string('regNumber')->unique();
            $table->string('surname');
            $table->string('othernames');
            $table->tinyInteger('sex');
            $table->date('dateOfBirth');
            $table->string('phone')->nullable();
            $table->string('lastSchool');
            $table->date('admissionDate');
            $table->integer('level_id')->unsigned();///admissionClass
            $table->text('address');
            $table->string('image');
            $table->boolean('is_active')->default(true);
            $table->integer('guardian_id')->unsigned();
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
        Schema::dropIfExists('students');
    }
}
