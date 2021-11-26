<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->bigInteger('equipment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('equipment_id')
            ->references('id')
            ->on('equipment')->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
