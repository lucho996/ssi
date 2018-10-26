<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposYOHerramientasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'equipos_y_o_herramientas';

    /**
     * Run the migrations.
     * @table equipos_y_o_herramientas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_EH');
            $table->integer('ID_INVENTARIO')->nullable()->default(null)->unsigned();
            $table->integer('ID_PRODUCTO')->nullable()->default(null)->unsigned();
            $table->string('UNIDAD_E', 30)->nullable()->default(null);
            $table->integer('CANTIDAD_DIAS_E')->nullable()->default(null);
            $table->integer('VALOR_TOTAL_E')->nullable()->default(null);

            $table->index(["ID_PRODUCTO"], 'FK_UTILIZA');

            $table->index(["ID_INVENTARIO"], 'FK_RELATIONSHIP_3');


            $table->foreign('ID_INVENTARIO', 'FK_RELATIONSHIP_3')
                ->references('ID_INVENTARIO')->on('inventario')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('ID_PRODUCTO', 'FK_UTILIZA')
                ->references('ID_PRODUCTO')->on('producto')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
