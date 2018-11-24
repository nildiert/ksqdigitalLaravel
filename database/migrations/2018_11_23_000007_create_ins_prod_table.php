<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsProdTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ins_prod';

    /**
     * Run the migrations.
     * @table ins_prod
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('productos_id');
            $table->unsignedInteger('insumos_id');
            $table->string('observacion', 45)->nullable();
            $table->string('usuario', 45)->nullable();
            $table->tinyInteger('estado')->nullable()->default('1');

            $table->index(["insumos_id"], 'fk_ins_prod_insumos1_idx');

            $table->index(["productos_id"], 'fk_ins_prod_productos1_idx');
            $table->nullableTimestamps();


            $table->foreign('productos_id', 'fk_ins_prod_productos1_idx')
                ->references('id')->on('productos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('insumos_id', 'fk_ins_prod_insumos1_idx')
                ->references('id')->on('insumos')
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
