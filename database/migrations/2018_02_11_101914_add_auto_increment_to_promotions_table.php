<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoIncrementToPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
           DB::statement('ALTER TABLE promotions MODIFY id INTEGER NOT NULL AUTO_INCREMENT UNIQUE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            DB::statement('ALTER TABLE promotions MODIFY id INTEGER NOT NULL');
        });
    }
}
