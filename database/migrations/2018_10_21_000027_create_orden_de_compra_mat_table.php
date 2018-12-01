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
            $table->integer('ID_PRODUCTO')->nullable()->default(null)->unsigned();
            $table->integer('ID_FACTURA')->nullable()->default(null)->unsigned();
            $table->integer('RUT')->nullable()->default(null)->unsigned();
            $table->integer('ID_IVA')->nullable()->default(null)->unsigned();
            $table->dateTime('FECHA_EMISION')->nullable()->default(null);
            $table->string('CONDICIONES_PAGO', 50)->nullable()->default(null);
            $table->integer('VALOR_NETO')->nullable()->default(null);
            $table->integer('VALOR_TOTAL')->nullable()->default(null);

        

            $table->index(["ID_IVA"], 'ID_IVA_FK');
            $table->index(["RUT"], 'RUT_PRO_FK');
            $table->index(["ID_PRODUCTO"], 'ID_PROD_FK');
  

            $table->index(["ID_FACTURA"], 'ID_FAC_FK');


            $table->foreign('ID_FACTURA', 'ID_FAC_FK')
                ->references('ID_FACTURA')->on('factura_proveedor')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('ID_IVA', 'ID_IVA_FK')
                ->references('ID_IVA')->on('iva')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                
                $table->foreign('RUT', 'RUT_PRO_FK')
                ->references('RUT')->on('proveedor')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                
                $table->foreign('ID_PRODUCTO', 'ID_PROD_FK')
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
