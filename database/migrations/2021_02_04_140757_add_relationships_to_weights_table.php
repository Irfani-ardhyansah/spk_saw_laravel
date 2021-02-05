<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weights', function(Blueprint $table) {
            $table->foreign('criteria_id')->references('id')->on('criterias')
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
        Schema::table('weights', function(Blueprint $table) {
            $table->dropForeign('weigths_criteria_id_foreign');
        });

        Schema::table('weights', function(Blueprint $table) {
            $table->dropIndex('weights_criteria_id_foreign');
        });
    }
}
