<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenDeCompraMatTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'orden_de_compra_mat';

    /**
     * Run the migrations.
     * @table orden_de_compra_mat
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_ORDEN_COMPRA');
            $table->integer('ID_MATERIAL')->nullable()->default(null)->unsigned();
            $table->integer('RUT')->nullable()->default(null)->unsigned();
            $table->dateTime('FECHA_EMISION')->nullable()->default(null);
            $table->string('CONDICIONES_PAGO', 50)->nullable()->default(null);
            $table->integer('VALOR_NETO')->nullable()->default(null);
            $table->integer('VALOR_TOTAL')->nullable()->default(null);

            $table->index(["ID_MATERIAL"], 'FK_RELATIONSHIP_7');

            $table->index(["RUT"], 'FK_RELATIONSHIP_8');


            $table->foreign('ID_MATERIAL', 'FK_RELATIONSHIP_7')
                ->references('ID_MATERIAL')->on('material')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('RUT', 'FK_RELATIONSHIP_8')
                ->references('RUT')->on('proveedor')
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
