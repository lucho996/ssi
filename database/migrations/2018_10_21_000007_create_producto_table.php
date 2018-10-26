<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'producto';

    /**
     * Run the migrations.
     * @table producto
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_PRODUCTO');
            $table->string('DESCRIPCION', 50)->nullable()->default(null);
            $table->string('TIPO_PRODUCTO', 20)->nullable()->default(null);
            $table->string('PLANO_PRODUCTO', 50)->nullable()->default(null);
            $table->dateTime('FECHA_DE_ENTREGA_PRODUCTO')->nullable()->default(null);
            $table->string('ESTADO', 50)->nullable()->default(null);
            $table->integer('UTILIDADES')->nullable()->default(null);
            $table->integer('GASTOS_GENERALES')->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);

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
