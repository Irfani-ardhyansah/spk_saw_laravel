<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsProdiIdToMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function(Blueprint $table) {
            $table->integer('prodi_id')->unsigned()->nullable()->after('id');
            $table->foreign('prodi_id')->references('id')->on('prodis')
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
        Schema::table('mahasiswas', function(Blueprint $table) {
            $table->dropForeign('mahasiswas_user_id_foreign');
        });

        Schema::table('mahasiswas', function(Blueprint $table) {
            $table->dropIndex('mahasiswas_user_id_foreign');
        });
    }
}
