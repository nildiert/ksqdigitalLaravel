<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'provins';

    /**
     * Run the migrations.
     * @table provins
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Insumos_InsCodigo');
            $table->integer('Proveedor_ProvCodigo');
            $table->integer('ProvinsPrecio')->nullable()->default(null)->comment('Precio insumo
');
            $table->date('ProvinsFecha')->nullable()->default(null)->comment('Fecha del precio del insumo para el proveedor');
            $table->string('ProvinsUsuSesion', 20)->nullable()->default(null)->comment('Registra el usuario que genero la ultima operacion sobre la tuble');
            $table->timestamp('Provins_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla');
            $table->timestamp('Provins_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('ProvinsEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');

            $table->index(["Proveedor_ProvCodigo"], 'fk_provins_proveedor1_idx');


            $table->foreign('Insumos_InsCodigo', 'provins_Insumos_InsCodigo')
                ->references('InsCodigo')->on('insumos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Proveedor_ProvCodigo', 'fk_provins_proveedor1_idx')
                ->references('ProvCodigo')->on('proveedor')
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
