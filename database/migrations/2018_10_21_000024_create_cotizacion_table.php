<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cotizacion';

    /**
     * Run the migrations.
     * @table cotizacion
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_COTIZACION');
            $table->integer('ID_ORDEN_COMPRA')->nullable()->default(null)->unsigned();
            $table->integer('ID_IVA')->nullable()->default(null)->unsigned();
            $table->integer('RUT_CLIENTE')->nullable()->default(null)->unsigned();
            $table->string('DESCRIPCION', 50)->nullable()->default(null);
            $table->date('FECHA_COTIZACION')->nullable()->default(null);
            $table->dateTime('FECHA_LLEGADA')->nullable()->default(null);
            $table->date('FECHA_RESPUESTA_COTIZACION')->nullable()->default(null);
            $table->integer('VALOR_NETO')->nullable()->default(null);
            $table->integer('VALOR_TOTAL')->nullable()->default(null);
            $table->integer('COD_PETICION_OFERTA')->nullable()->default(null);
            $table->integer('PORC_DESCUENTO')->nullable()->default(null);
            $table->string('ESTADO', 50)->nullable()->default(null);

            $table->index(["ID_IVA"], 'FK_RELATIONSHIP_25');

            $table->index(["ID_ORDEN_COMPRA"], 'FK_RELATIONSHIP_14');
            $table->index(["RUT_CLIENTE"], 'FK_solicita');


            $table->foreign('ID_ORDEN_COMPRA', 'FK_RELATIONSHIP_14')
                ->references('ID_ORDEN_COMPRA')->on('orden_de_compra')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->foreign('RUT_CLIENTE', 'FK_solicita')
                ->references('RUT_CLIENTE')->on('clientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ID_IVA', 'FK_RELATIONSHIP_25')
                ->references('ID_IVA')->on('iva')
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
