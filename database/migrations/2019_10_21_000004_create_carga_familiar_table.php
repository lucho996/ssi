<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargaFamiliarTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'carga_familiar';

    /**
     * Run the migrations.
     * @table personal
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_CARGA_FAMILIAR');
            $table->integer('RUTP')->nullable()->default(null)->unsigned();
            $table->integer('RUT')->nullable()->default(null);
            $table->string('NOMBRE', 30)->nullable()->default(null);
            $table->date('FECHA_NACIMIENTO')->nullable()->default(null);
 
            $table->index(["RUTP"], 'RUT_PER_FK');
           
            $table->foreign('RUTP', 'RUT_PER_FK')
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
