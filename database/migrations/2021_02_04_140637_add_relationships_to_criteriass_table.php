<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToCriteriassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criterias', function(Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('admins')
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
        Schema::table('criterias', function(Blueprint $table) {
            $table->dropForeign('criterias_admin_id_foreign');
        });

        Schema::table('criterias', function(Blueprint $table) {
            $table->dropIndex('criterias_admin_id_foreign');
        });
    }
}
