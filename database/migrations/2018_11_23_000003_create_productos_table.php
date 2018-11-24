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
            $table->increments('id');
            $table->string('nombre', 45)->nullable();
            $table->string('presentacion', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->string('precioBogota', 45)->nullable();
            $table->string('precioNacional', 45)->nullable();
            $table->string('maquila', 45)->nullable();
            $table->string('usuario', 45)->nullable();
            $table->tinyInteger('estado')->nullable()->default('1');
            $table->nullableTimestamps();
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
