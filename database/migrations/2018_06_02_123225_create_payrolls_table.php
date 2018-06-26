<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->string('year');
            $table->integer('term_id');
            $table->integer('staff_id');
            $table->decimal('gross_salary', 8,2);
            $table->decimal('loan', 8,2);//---deduction begining
            $table->decimal('iou', 8,2);
            $table->decimal('others', 8,2);
            $table->decimal('total', 8,2);// -- deductions ended
            $table->decimal('net_salary', 8,2);
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
        Schema::dropIfExists('payrolls');
    }
}
