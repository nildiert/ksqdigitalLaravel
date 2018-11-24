<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenproduccionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ordenproduccion';

    /**
     * Run the migrations.
     * @table ordenproduccion
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('OrdPId')->comment('Id de las ordenes de producción');
            $table->date('OrdPFecha')->nullable()->default(null)->comment('Fecha en la que se registra la orden de producción');
            $table->string('OrdPAsignada', 45)->nullable()->default(null)->comment('Persona a la que se le asigna la orden de producción\\\\n');
            $table->string('OrdPFuente', 45)->nullable()->default(null)->comment('Persona que asigno la orden de producción\\\\n');
            $table->integer('OrdPCant')->nullable()->default(null)->comment('Cantidad solicitada por cada producto');
            $table->string('OrdPObservaciones', 45)->nullable()->default(null)->comment('Observaciones registradas en cada orden de producción \\\\n');
            $table->integer('Cliente_Cliid')->comment('Relación existente entre el id de cliente y la orden de producción');
            $table->integer('Productos_ProCodigo')->comment('Establece la relación entre la orden de producción y el código del producto');
            $table->string('OrdenprodUsuSesion', 20)->nullable()->default(null)->comment('Registra el usuario que genero la ultima operacion sobre la tuble');
            $table->timestamp('Ordenprod_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Registra el tiempo de creacion de la tupla');
            $table->timestamp('Ordenprod_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Registra el tiempo en el que se actualiza cualquier dato de la tupla');
            $table->tinyInteger('OrdenprodEstado')->nullable()->default('1')->comment('Este campo se utiliza para establecer si esta activo o inactivo el valor');
            $table->date('OrdPFechaEntrega')->nullable()->comment('Esta tabla guarda la fecha de entrega de la orden de producción');

            $table->index(["Productos_ProCodigo"], 'fk_ordenproduccion_productos1_idx');

            $table->index(["Cliente_Cliid"], 'fk_ordenproduccion_Cliente1_idx');


            $table->foreign('Cliente_Cliid', 'fk_ordenproduccion_Cliente1_idx')
                ->references('Cliid')->on('cliente')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Productos_ProCodigo', 'fk_ordenproduccion_productos1_idx')
                ->references('ProCodigo')->on('productos')
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
