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
            $table->integer('TELEFONOP')->nullable()->default(null);
            $table->string('CORREOP', 50)->nullable()->default(null);
            $table->integer('HORAHOMBRE')->nullable()->default(null);
            $table->date('FECHANACIMIENTO')->nullable()->default(null);
            $table->string('DIRECCION', 50)->nullable()->default(null);
            $table->string('TIPO', 30)->nullable()->default(null);
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
