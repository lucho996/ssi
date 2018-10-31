<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCotizacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'detalle_cotizacion';

    /**
     * Run the migrations.
     * @table detalle_cotizacion
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_DETALLE_COTIZACION');
            $table->integer('ID_PRODUCTO')->unsigned();
            $table->integer('ID_COTIZACION')->unsigned();
            //$table->integer('ID_CONVENIO')->nullable()->default(null)->unsigned();
            $table->string('UNIDAD', 30)->nullable()->default(null);
            $table->integer('CANTIDAD')->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);

          //  $table->index(["ID_CONVENIO"], 'FK_RELATIONSHIP_32');

            $table->index(["ID_PRODUCTO"], 'FK_RELATIONSHIP_29');

            $table->index(["ID_COTIZACION"], 'FK_RELATIONSHIP_28');


            $table->foreign('ID_COTIZACION', 'FK_RELATIONSHIP_28')
                ->references('ID_COTIZACION')->on('cotizacion')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('ID_PRODUCTO', 'FK_RELATIONSHIP_29')
                ->references('ID_PRODUCTO')->on('producto')
                ->onDelete('restrict')
                ->onUpdate('restrict');

           /* $table->foreign('ID_CONVENIO', 'FK_RELATIONSHIP_32')
                ->references('ID_CONVENIO')->on('convenios')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
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
