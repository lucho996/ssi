<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'proveedor';

    /**
     * Run the migrations.
     * @table proveedor
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('RUT');
            $table->string('NOMBRE', 50)->nullable()->default(null);
            $table->string('DIRECCION', 50)->nullable()->default(null);
            $table->string('CIUDAD', 50)->nullable()->default(null);
            $table->integer('TELEFONO')->nullable()->default(null);
            $table->string('CORREO', 50)->nullable()->default(null);
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
