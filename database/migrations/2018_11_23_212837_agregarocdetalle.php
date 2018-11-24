<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agregarocdetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $set_schema_table = 'oc_detalle';
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_DETALLE_OC');
            $table->integer('ID_MATERIAL')->nullable()->default(null)->unsigned();
            $table->integer('RUT')->nullable()->default(null)->unsigned();
          
            
            $table->integer('CANTIDAD')->nullable()->default(null);
            $table->integer('PRECIO_UNITARIO')->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);


            $table->index(["ID_MATERIAL"], 'materialdetalle');

            $table->index(["RUT"], 'rutdetalle');
           
            


            $table->foreign('ID_MATERIAL', 'materialdetalle')
                ->references('ID_MATERIAL')->on('material')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('RUT', 'rutdetalle')
                ->references('RUT')->on('proveedor')
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
