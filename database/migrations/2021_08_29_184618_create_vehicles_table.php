<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_type');
            $table->string('vehicle_condition');
            $table->unsignedBigInteger('vehicle_make_id')->nullable();
            $table->text('model');
            $table->string('start_type')->nullable();
            $table->text('manufactured_year')->nullable();
            $table->text('price');
            $table->tinyInteger('on_going_lease')->nullable();
            $table->string('transmission');
            $table->string('fuel_type');
            $table->string('engine_capacity');
            $table->text('millage');
            $table->tinyInteger('isAc')->nullable();
            $table->tinyInteger('isPowerSteer')->nullable();
            $table->tinyInteger('isPowerMirroring')->nullable();
            $table->tinyInteger('isPowerWindow')->nullable();
            $table->text('additional_info')->nullable();
            $table->foreign('vehicle_make_id')->references('id')
                    ->on('vehicle_makes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vehicles');
    }

}
