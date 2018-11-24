<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cliente';

    /**
     * Run the migrations.
     * @table cliente
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Cliid')->comment('Para dar una identificacion al cliente');
            $table->string('CliNombre', 45)->nullable()->default(null)->comment('Para registrar el nombre del cliente que esta realizando una orden de compra');
            $table->string('CliDireccion', 45)->nullable()->default(null)->comment('Para registrar la direccion del cliente que esta realizando una orden de compra');
            $table->string('CliTelefono', 45)->nullable()->default(null)->comment('Para registrar el telefono del cliente que esta realizando una orden de compra');
            $table->string('CliUsuSesion', 20)->nullable()->default(null)->comment('Registra el usuario que genero la ultima operacion sobre la tuble');
            $table->timestamp('Cli_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla
');
            $table->timestamp('Cli_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('CliEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');
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
