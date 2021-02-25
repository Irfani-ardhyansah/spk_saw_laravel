<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReationshipsToAnnouncementsToPeriodsTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anouncements', function(Blueprint $table) {
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
        Schema::table('anouncements', function(Blueprint $table) {
            $table->dropForeign('anouncements_period_id_foreign');
        });

        Schema::table('anouncements', function(Blueprint $table) {
            $table->dropIndex('anouncements_period_id_foreign');
        });
    }
}
