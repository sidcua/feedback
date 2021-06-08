<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('clientID');
            $table->integer('responsiveness')->default(0);
            $table->integer('reliability')->default(0);
            $table->integer('access')->default(0);
            $table->integer('communication')->default(0);
            $table->integer('cost')->default(0);
            $table->integer('integrity')->default(0);
            $table->integer('assurance')->default(0);
            $table->integer('outcome')->default(0);
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
        Schema::dropIfExists('clients');
    }
}
