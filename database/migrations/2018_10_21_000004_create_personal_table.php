<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'personal';

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
            $table->integer('RUTP')->unsigned()->unique();
            $table->primary('RUTP');
           $table->string('NOMBREP', 30)->nullable()->default(null);
            $table->string('APELLIDOP', 30)->nullable()->default(null);
            $table->string('CIUDAD', 30)->nullable()->default(null);
            $table->string('DIRECCION', 50)->nullable()->default(null);
            $table->string('ESTADO_CIVIL', 50)->nullable()->default(null);
            $table->string('TITULO', 100)->nullable()->default(null);
            $table->string('NOMBRE_CONYUGE', 50)->nullable()->default(null);
            $table->string('TELEFONO_CONYUGE', 9)->nullable()->default(null);
            $table->integer('TELEFONOP')->nullable()->default(null);
            $table->string('CORREOP', 50)->nullable()->default(null);
            $table->date('FECHANACIMIENTO')->nullable()->default(null);
            $table->string('ESTADO',30)->nullable()->default(null);
            $table->string('MOTIVO', 100)->nullable()->default(null);
            $table->string('LUGAR_TRABAJO',30)->nullable()->default(null);
            $table->string('PREVISION',30)->nullable()->default(null);
            $table->string('AFP',30)->nullable()->default(null);
            $table->integer('SUELDO_BASE')->nullable()->default(null);
            $table->integer('GRATIFICACION')->nullable()->default(null);
            $table->integer('MOVILIZACION')->nullable()->default(null);
            $table->integer('COLACION')->nullable()->default(null);
            $table->date('FECHA_INICIO_CONTRATO')->nullable()->default(null);
            $table->date('FECHA_TERMINO_CONTRATO')->nullable()->default(null);
            $table->string('TALLA_ROPA',30)->nullable()->default(null);
            $table->integer('NZAPATO')->nullable()->default(null);
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
