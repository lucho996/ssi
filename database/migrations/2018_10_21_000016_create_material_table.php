<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'material';

    /**
     * Run the migrations.
     * @table material
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_MATERIAL');
            $table->integer('ID_PRODUCTO')->nullable()->default(null)->unsigned();
            $table->integer('CANTIDAD')->nullable()->default(null);
            $table->string('NOMBRE', 50)->nullable()->default(null);
            $table->integer('PRECIO_UNITARIO')->nullable()->default(null);
            $table->string('DESCRIPCION', 50)->nullable()->default(null);
            $table->string('ESTADO', 20)->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);

            $table->index(["ID_PRODUCTO"], 'FK_REQUIERE');


            $table->foreign('ID_PRODUCTO', 'FK_REQUIERE')
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
