<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'estado_usuario';

    /**
     * Run the migrations.
     * @table estado_usuario
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_ESTADO');
            $table->integer('ID_ESTADO_USER')->unsigned();
            $table->integer('RUTP')->unsigned();
            $table->dateTime('FECHA_CONEXION')->nullable()->default(null);
            $table->dateTime('FECHA_DESCONEXION')->nullable()->default(null);

            $table->index(["ID_ESTADO_USER"], 'FK_RELATIONSHIP_40');

            $table->index(["RUTP"], 'FK_RELATIONSHIP_39');


            $table->foreign('RUTP', 'FK_RELATIONSHIP_39')
                ->references('RUTP')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ID_ESTADO_USER', 'FK_RELATIONSHIP_40')
                ->references('ID_ESTADO_USER')->on('estado')
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
