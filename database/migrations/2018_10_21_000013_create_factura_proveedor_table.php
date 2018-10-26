<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProveedorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'factura_proveedor';

    /**
     * Run the migrations.
     * @table factura_proveedor
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_FACTURA');
            $table->integer('RUT')->nullable()->default(null)->unsigned();
            $table->integer('NUMERO_FACTURA')->nullable()->default(null);
            $table->dateTime('FECHA_INGRESO')->nullable()->default(null);
            $table->string('RUTA', 50)->nullable()->default(null);

            $table->index(["RUT"], 'FK_RELATIONSHIP_10');


            $table->foreign('RUT', 'FK_RELATIONSHIP_10')
                ->references('RUT')->on('proveedor')
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
