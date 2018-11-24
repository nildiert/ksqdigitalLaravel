<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdencompraTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ordencompra';

    /**
     * Run the migrations.
     * @table ordencompra
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('OrdComId');
            $table->date('OrdComFecha')->nullable()->default(null);
            $table->string('OrdComUsuSesion', 20)->nullable()->default(null)->comment('
Registra el usuario que genero la ultima operacion sobre la tuble
');
            $table->timestamp('OrdCom_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla');
            $table->timestamp('OrdCom_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('OrdComEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');
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
