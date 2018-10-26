<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'factura';

    /**
     * Run the migrations.
     * @table factura
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_FACTURA');
            $table->integer('ID_COTIZACION')->nullable()->default(null)->unsigned();
            $table->integer('RUT_CLIENTE')->nullable()->default(null)->unsigned();
            $table->dateTime('FECHA_EMISION')->nullable()->default(null);
            $table->string('FORMA_PAGO', 50)->nullable()->default(null);

            $table->index(["ID_COTIZACION"], 'FK_RELATIONSHIP_27');

            $table->index(["RUT_CLIENTE"], 'FK_RELATIONSHIP_38');


            $table->foreign('ID_COTIZACION', 'FK_RELATIONSHIP_27')
                ->references('ID_COTIZACION')->on('cotizacion')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('RUT_CLIENTE', 'FK_RELATIONSHIP_38')
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
