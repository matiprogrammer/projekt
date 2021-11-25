<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_tags', function (Blueprint $table) {
            $table->bigInteger('equipment_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('equipment_id')
            ->references('id')
            ->on('equipment')
            ->onDelete('cascade');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_tags');
    }
}
