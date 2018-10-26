<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManoDeObraTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'mano_de_obra';

    /**
     * Run the migrations.
     * @table mano_de_obra
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_MANO_OBRA');
            $table->integer('ID_PRODUCTO')->nullable()->default(null)->unsigned();
            $table->integer('RUTP')->nullable()->default(null)->unsigned();
            $table->integer('CANTIDAD_HORAS')->nullable()->default(null);
            $table->integer('TOTAL_MANO_OBRA')->nullable()->default(null);

            $table->index(["RUTP"], 'FK_REALIZA');

            $table->index(["ID_PRODUCTO"], 'FK_ES_PRODUCIDO');


            $table->foreign('ID_PRODUCTO', 'FK_ES_PRODUCIDO')
                ->references('ID_PRODUCTO')->on('producto')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('RUTP', 'FK_REALIZA')
                ->references('RUTP')->on('personal')
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
