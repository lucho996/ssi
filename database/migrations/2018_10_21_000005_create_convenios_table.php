<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateConveniosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'convenios';
    /**
     * Run the migrations.
     * @table convenios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID_CONVENIO');
            $table->integer('ID_IVA')->nullable()->default(null)->unsigned();
            $table->integer('ID_ORDEN_COMPRA')->nullable()->default(null)->unsigned();
            $table->date('FECHA_INICIO')->nullable()->default(null);
            $table->date('FECHA_TERMINO')->nullable()->default(null);
            $table->integer('TOTAL')->nullable()->default(null);
            $table->integer('NETO')->nullable()->default(null);
            $table->string('N_CONVENIO',50)->nullable()->default(null);
            $table->date('FECHA_EMISION')->nullable()->default(null);
            $table->string('CONDICION_PAGO',50)->nullable()->default(null);
            $table->string('NOMBRE_PERSONA_ACARGO',50)->nullable()->default(null);
            $table->integer('NUMERO_PERSONA')->nullable()->default(null);
            $table->string('CORREO_PERSONA',50)->nullable()->default(null);

            $table->index(["ID_IVA"], 'FK_IVA_CONVENIO');
            $table->index(["ID_ORDEN_COMPRA"], 'FK_OC_CONVENIO');


            $table->foreign('ID_IVA', 'FK_IVA_CONVENIO')
                ->references('ID_IVA')->on('iva')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('ID_ORDEN_COMPRA', 'FK_OC_CONVENIO')
                ->references('ID_ORDEN_COMPRA')->on('orden_de_compra')
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
