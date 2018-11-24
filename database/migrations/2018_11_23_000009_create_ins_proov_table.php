<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsProovTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ins_proov';

    /**
     * Run the migrations.
     * @table ins_proov
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('insumos_id');
            $table->unsignedInteger('proovedores_id');
            $table->string('precio', 45)->nullable();
            $table->date('fecha')->nullable();
            $table->string('usuario', 45)->nullable();
            $table->string('estado', 45)->nullable();

            $table->index(["proovedores_id"], 'fk_table1_proovedores1_idx');

            $table->index(["insumos_id"], 'fk_table1_insumos1_idx');
            $table->nullableTimestamps();


            $table->foreign('insumos_id', 'fk_table1_insumos1_idx')
                ->references('id')->on('insumos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('proovedores_id', 'fk_table1_proovedores1_idx')
                ->references('id')->on('proovedores')
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
