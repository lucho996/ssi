<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleGuiaDespachoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'detalle_guia_despacho';

    /**
     * Run the migrations.
     * @table detalle_guia_despacho
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_DETALLE_GUIA');
            $table->integer('ID_GUIA_DESPACHO')->unsigned();
            $table->integer('ID_PRODUCTO')->unsigned();
            $table->string('UNIDAD', 50)->nullable()->default(null);
            $table->integer('CANTIDAD')->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);

            $table->index(["ID_PRODUCTO"], 'FK_RELATIONSHIP_30');

            $table->index(["ID_GUIA_DESPACHO"], 'FK_RELATIONSHIP_31');


            $table->foreign('ID_PRODUCTO', 'FK_RELATIONSHIP_30')
                ->references('ID_PRODUCTO')->on('producto')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ID_GUIA_DESPACHO', 'FK_RELATIONSHIP_31')
                ->references('ID_GUIA_DESPACHO')->on('guia_despacho')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
