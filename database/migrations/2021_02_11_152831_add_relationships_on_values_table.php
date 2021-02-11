<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsOnValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('values', function(Blueprint $table) {
            $table->foreign('period_id')->references('id')->on('periods')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('criteria_id')->references('id')->on('criterias')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')
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
        Schema::table('values', function(Blueprint $table) {
            $table->dropForeign('values_period_id_foreign');
        });

        Schema::table('values', function(Blueprint $table) {
            $table->dropIndex('values_period_id_foreign');
        });

        Schema::table('values', function(Blueprint $table) {
            $table->dropForeign('values_criteria_id_foreign');
        });

        Schema::table('values', function(Blueprint $table) {
            $table->dropIndex('values_criteria_id_foreign');
        });

        Schema::table('values', function(Blueprint $table) {
            $table->dropForeign('values_mahasiswa_id_foreign');
        });

        Schema::table('values', function(Blueprint $table) {
            $table->dropIndex('values_mahasiswa_id_foreign');
        });
    }
}
