<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientoTrabajoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'seguimiento_trabajo';

    /**
     * Run the migrations.
     * @table seguimiento_trabajo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_SEGUIMIENTO');
            $table->integer('ID_OT')->nullable()->default(null)->unsigned();
            $table->string('ESTADO', 20)->nullable()->default(null);
            $table->string('DESCRIPCION', 50)->nullable()->default(null);
            $table->dateTime('FECHA')->nullable()->default(null);

            $table->index(["ID_OT"], 'FK_RELATIONSHIP_17');


            $table->foreign('ID_OT', 'FK_RELATIONSHIP_17')
                ->references('ID_OT')->on('orden_trabajo')
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
