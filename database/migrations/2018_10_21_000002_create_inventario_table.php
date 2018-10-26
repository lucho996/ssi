<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'inventario';

    /**
     * Run the migrations.
     * @table inventario
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_INVENTARIO');
            $table->string('NOMBRE', 50)->nullable()->default(null);
            $table->string('MARCA', 50)->nullable()->default(null);
            $table->string('UBICACION', 20)->nullable()->default(null);
            $table->integer('VALOR')->nullable()->default(null);
            $table->string('ESTADO', 20)->nullable()->default(null);
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
