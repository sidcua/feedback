<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletePercentageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('percentage', function (Blueprint $table) {
            Schema::dropIfExists('percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('percentage', function (Blueprint $table) {
            $table->increments('percentageID');
            $table->string('hei');
            $table->string('program');
            $table->double('percentage');
            $table->timestamps();
        });
    }
}
