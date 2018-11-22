<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleConvenioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'detalle_convenio';

    /**
     * Run the migrations.
     * @table detalle_convenio
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_DETALLE_CONVENIO');
            $table->integer('ID_PRODUCTO')->unsigned();
            $table->integer('ID_CONVENIO')->unsigned();
            $table->string('UNIDAD', 20)->nullable()->default(null);
            $table->integer('CANTIDAD')->nullable()->default(null);
            $table->integer('VALOR_UNITARIO')->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);

            $table->index(["ID_PRODUCTO"], 'FK_RELATIONSHIP_34');

            $table->index(["ID_CONVENIO"], 'FK_RELATIONSHIP_33');


            $table->foreign('ID_CONVENIO', 'FK_RELATIONSHIP_33')
                ->references('ID_CONVENIO')->on('convenios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ID_PRODUCTO', 'FK_RELATIONSHIP_34')
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
