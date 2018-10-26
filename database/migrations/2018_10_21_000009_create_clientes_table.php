<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'clientes';

    /**
     * Run the migrations.
     * @table clientes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('RUT_CLIENTE')->unsigned();
            $table->primary('RUT_CLIENTE');
            $table->string('NOMBRE_COMPLETO', 50)->nullable()->default(null);
            $table->string('DIRECCION', 50)->nullable()->default(null);
            $table->string('CIUDAD', 50)->nullable()->default(null);
            $table->string('COMUNA', 30)->nullable()->default(null);
            $table->string('GIRO', 100)->nullable()->default(null);
            $table->integer('TELEFONO')->nullable()->default(null);
            $table->string('TIPO', 20)->nullable()->default(null);
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
