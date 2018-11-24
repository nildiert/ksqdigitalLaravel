<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'proveedor';

    /**
     * Run the migrations.
     * @table proveedor
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ProvCodigo')->comment('Id de proveedor\\\\n');
            $table->string('ProvNombre', 30)->nullable()->default(null)->comment('Nombre del proveedor\\\\n');
            $table->string('ProvUsuSesion', 20)->nullable()->default(null)->comment('Registra el usuario que genero la ultima operacion sobre la tuble');
            $table->timestamp('Prov_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla
');
            $table->timestamp('Prov_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('ProvEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');
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
