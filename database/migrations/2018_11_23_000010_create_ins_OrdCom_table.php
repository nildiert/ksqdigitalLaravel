<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsOrdcomTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ins_OrdCom';

    /**
     * Run the migrations.
     * @table ins_OrdCom
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
            $table->unsignedInteger('ordenCompra_id');
            $table->string('usuario', 45)->nullable();
            $table->tinyInteger('estado')->nullable()->default('1');

            $table->index(["insumos_id"], 'fk_ins_OrdCom_insumos1_idx');

            $table->index(["ordenCompra_id"], 'fk_ins_OrdCom_ordenCompra1_idx');
            $table->nullableTimestamps();


            $table->foreign('insumos_id', 'fk_ins_OrdCom_insumos1_idx')
                ->references('id')->on('insumos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ordenCompra_id', 'fk_ins_OrdCom_ordenCompra1_idx')
                ->references('id')->on('ordenCompra')
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
