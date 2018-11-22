<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenDeCompraTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'orden_de_compra';

    /**
     * Run the migrations.
     * @table orden_de_compra
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_ORDEN_COMPRA');
            $table->integer('RUT_CLIENTE')->nullable()->default(null)->unsigned();
            $table->integer('NUM_ORDEN_COMPRA')->nullable()->default(null);
            $table->date('FECHA_INGRESO')->nullable()->default(null);
            $table->string('RUTA', 50)->nullable()->default(null);

            $table->index(["RUT_CLIENTE"], 'FK_RELATIONSHIP_41');


            $table->foreign('RUT_CLIENTE', 'FK_RELATIONSHIP_41')
                ->references('RUT_CLIENTE')->on('clientes')
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
