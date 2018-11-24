<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProinsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'proins';

    /**
     * Run the migrations.
     * @table proins
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('Productos_ProCodigo');
            $table->string('Insumos_InsCodigo', 5);
            $table->text('ProinsObservacion')->nullable()->default(null);
            $table->string('ProinsUsuSesion', 20)->nullable()->default(null)->comment('Registra el usuario que genero la ultima operacion sobre la tuble');
            $table->timestamp('Proins_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla');
            $table->timestamp('Proins_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('ProinsEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');

            $table->index(["Insumos_InsCodigo"], 'fk_proins_insumos1_idx');


            $table->foreign('Insumos_InsCodigo', 'fk_proins_insumos1_idx')
                ->references('InsCodigo')->on('insumos')
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
