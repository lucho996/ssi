<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteConvenioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cliente_convenio';

    /**
     * Run the migrations.
     * @table cliente_convenio
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_cliente_convenio');
            $table->integer('RUT_CLIENTE')->unsigned();
            $table->integer('ID_CONVENIO')->unsigned();

            $table->index(["ID_CONVENIO"], 'FK_RELATIONSHIP_23');


            $table->foreign('ID_CONVENIO', 'FK_RELATIONSHIP_23')
                ->references('ID_CONVENIO')->on('convenios')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('RUT_CLIENTE', 'cliente_convenio_RUT_CLIENTE')
                ->references('RUT_CLIENTE')->on('clientes')
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
