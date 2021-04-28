<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->string('title');
            $table->text('content');
            $table->timestamps();

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
        Schema::dropIfExists('dashboards');

        Schema::table('adminss', function(Blueprint $table) {
            $table->dropForeign('admins_admin_id_foreign');
        });

        Schema::table('anouncements', function(Blueprint $table) {
            $table->dropIndex('admins_admin_id_foreign');
        });
    }
}
