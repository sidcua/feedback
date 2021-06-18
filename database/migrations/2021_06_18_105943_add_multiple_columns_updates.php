<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultipleColumnsUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('sex')->after('client')->nullable();
            $table->string('type')->after('sex')->nullable();
            $table->string('institution')->after('type')->nullable();
            $table->string('transaction')->after('institution')->nullable();
            $table->string('service')->after('transaction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('type');
            $table->dropColumn('institution');
            $table->dropColumn('transaction');
            $table->dropColumn('service');
        });
    }
}
