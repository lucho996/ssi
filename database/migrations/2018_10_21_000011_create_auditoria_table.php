<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'auditoria';

    /**
     * Run the migrations.
     * @table auditoria
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_AUDITORIA');
            $table->string('TABLA', 30)->nullable()->default(null);
            $table->string('ATRIBUTO', 30)->nullable()->default(null);
            $table->string('VALOR_ANTIGUO', 100)->nullable()->default(null);
            $table->string('VALOR_NUEVO', 100)->nullable()->default(null);
            $table->dateTime('FECHA')->nullable()->default(null);
            $table->string('USUARIO', 12)->nullable()->default(null);
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
