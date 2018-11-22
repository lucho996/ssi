<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoPersonalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cargo_personal';

    /**
     * Run the migrations.
     * @table cargo_personal
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_CARGO_PERSONAL');
            $table->integer('ID_CARGO')->unsigned();
            $table->integer('RUTP')->unsigned();
            $table->dateTime('FECHA_CARGO')->nullable()->default(null);

            $table->index(["RUTP"], 'FK_RELATIONSHIP_36');

            $table->index(["ID_CARGO"], 'FK_RELATIONSHIP_37');


            $table->foreign('RUTP', 'FK_RELATIONSHIP_36')
                ->references('RUTP')->on('personal')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ID_CARGO', 'FK_RELATIONSHIP_37')
                ->references('ID_CARGO')->on('cargo')
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
