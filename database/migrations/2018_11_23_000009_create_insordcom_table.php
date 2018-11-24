<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsordcomTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'insordcom';

    /**
     * Run the migrations.
     * @table insordcom
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Insumos_InsCodigo');
            $table->integer('Ordencompra_OrdComId');
            $table->string('InsordcomUsuSesion', 20)->nullable()->default(null)->comment('
Registra el usuario que genero la ultima operacion sobre la tuble
');
            $table->timestamp('Insordcom_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla');
            $table->timestamp('Insordcom_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('InsordcomEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');

            $table->index(["Ordencompra_OrdComId"], 'fk_insordcom_ordencompra1_idx');


            $table->foreign('Insumos_InsCodigo', 'insordcom_Insumos_InsCodigo')
                ->references('InsCodigo')->on('insumos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Ordencompra_OrdComId', 'fk_insordcom_ordencompra1_idx')
                ->references('OrdComId')->on('ordencompra')
                ->onDelete('no action')
                ->onUpdate('no action');
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
