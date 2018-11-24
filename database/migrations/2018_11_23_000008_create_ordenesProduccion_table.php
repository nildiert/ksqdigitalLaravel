<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesproduccionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ordenesProduccion';

    /**
     * Run the migrations.
     * @table ordenesProduccion
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->string('asignacion', 45)->nullable();
            $table->string('fuente', 45)->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('observaciones', 45)->nullable();
            $table->string('usuario', 45)->nullable();
            $table->tinyInteger('estado')->nullable()->default('1');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('productos_id');

            $table->index(["productos_id"], 'fk_ordenProduccion_productos1_idx');

            $table->index(["cliente_id"], 'fk_ordenProduccion_cliente1_idx');
            $table->nullableTimestamps();


            $table->foreign('cliente_id', 'fk_ordenProduccion_cliente1_idx')
                ->references('id')->on('clientes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('productos_id', 'fk_ordenProduccion_productos1_idx')
                ->references('id')->on('productos')
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
