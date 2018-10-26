<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'orden_trabajo';

    /**
     * Run the migrations.
     * @table orden_trabajo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_OT');
            $table->integer('ID_PRODUCTO')->nullable()->default(null)->unsigned();
            $table->dateTime('FECHA_INICIO')->nullable()->default(null);
            $table->dateTime('FECHA_TERMINO')->nullable()->default(null);

            $table->index(["ID_PRODUCTO"], 'FK_RELATIONSHIP_16');


            $table->foreign('ID_PRODUCTO', 'FK_RELATIONSHIP_16')
                ->references('ID_PRODUCTO')->on('producto')
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
