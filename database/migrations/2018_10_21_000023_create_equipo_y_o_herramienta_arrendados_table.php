<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoYOHerramientaArrendadosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'equipo_y_o_herramienta_arrendados';

    /**
     * Run the migrations.
     * @table equipo_y_o_herramienta_arrendados
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_EQ_ARRENDADOS');
            $table->integer('ID_PRODUCTO')->nullable()->default(null)->unsigned();
            $table->string('NOMBRE', 50)->nullable()->default(null);
            $table->string('MARCA', 50)->nullable()->default(null);
            $table->integer('VALOR')->nullable()->default(null);
            $table->string('UNIDAD', 20)->nullable()->default(null);
            $table->integer('CANTIDAD')->nullable()->default(null);
            $table->integer('VALOR_TOTAL')->nullable()->default(null);
            $table->string('USER_C',30)->nullable()->default(null);
            $table->index(["ID_PRODUCTO"], 'FK_RELATIONSHIP_15');


            $table->foreign('ID_PRODUCTO', 'FK_RELATIONSHIP_15')
                ->references('ID_PRODUCTO')->on('producto')
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
