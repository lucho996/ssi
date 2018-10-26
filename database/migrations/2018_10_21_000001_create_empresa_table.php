<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'empresa';

    /**
     * Run the migrations.
     * @table empresa
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('RUT')->unsigned();
            $table->primary('RUT');
            $table->string('NOMBRE', 40)->nullable()->default(null);
            $table->string('GIRO', 100)->nullable()->default(null);
            $table->string('DIRECCION', 30)->nullable()->default(null);
            $table->string('CIUDAD', 20)->nullable()->default(null);
            $table->string('COMUNA', 30)->nullable()->default(null);
            $table->string('CORREO', 50)->nullable()->default(null);
            $table->integer('TELEFONO')->nullable()->default(null);
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
