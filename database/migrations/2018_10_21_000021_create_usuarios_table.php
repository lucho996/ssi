<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'usuarios';

    /**
     * Run the migrations.
     * @table usuarios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('RUTP')->unsigned();
            $table->primary('RUTP');
            $table->string('CONTRASENA', 30)->nullable()->default(null);
            $table->string('RE_CONTRASENA', 30)->nullable()->default(null);
            $table->dateTime('FECHA_REGISTRO')->nullable()->default(null);


            $table->foreign('RUTP', 'usuarios_RUTP')
                ->references('RUTP')->on('personal')
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
