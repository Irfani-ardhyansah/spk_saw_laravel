<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsOnUserPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_periods', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_periods', function(Blueprint $table) {
            $table->dropForeign('user_periods_user_id_foreign');
        });

        Schema::table('user_periods', function(Blueprint $table) {
            $table->dropIndex('user_periods_user_id_foreign');
        });

        Schema::table('user_periods', function(Blueprint $table) {
            $table->dropForeign('user_periods_period_id_foreign');
        });

        Schema::table('user_periods', function(Blueprint $table) {
            $table->dropIndex('user_periods_period_id_foreign');
        });
    }
}
