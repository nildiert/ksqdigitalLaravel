<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'productos';

    /**
     * Run the migrations.
     * @table productos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ProCodigo')->comment('ID  de producto\\\\n');
            $table->string('ProNombre', 50)->nullable()->default(null)->comment('Nombre del producto');
            $table->string('ProPresentacion', 20)->nullable()->default(null)->comment('Presentación en la que se vende cada producto una vez este fabricado');
            $table->string('ProDescripcion', 150)->nullable()->default(null)->comment('Descripción del producto');
            $table->integer('ProPrecioBogota')->nullable()->default(null)->comment('Precio del producto en Bogotá');
            $table->integer('ProPrecioNacional')->nullable()->default(null)->comment('Precio del producto a nivel nacional');
            $table->integer('ProMaquila')->nullable()->default(null)->comment('Costo de producción del producto');
            $table->string('ProdUsuSesion', 20)->nullable()->default(null)->comment('Registra el usuario que genero la ultima operacion sobre la tuble');
            $table->timestamp('Prod_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla');
            $table->timestamp('Prod_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('ProdEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');
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
