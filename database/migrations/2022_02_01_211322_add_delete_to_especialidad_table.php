<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteToEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidad', function (Blueprint $table) {
            $table->dropForeign('especialidad_abogado_id_foreign');
            $table->foreign('abogado_id')
                ->references('id')->on('abogados')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad', function (Blueprint $table) {
            //
        });
    }
}
