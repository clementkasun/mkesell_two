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
            $table->string('model');
            $table->string('start_type')->nullable();
            $table->string('manufactured_year')->nullable();
            $table->tinyInteger('on_going_lease')->nullable();
            $table->string('transmission');
            $table->string('fuel_type');
            $table->string('engine_capacity');
            $table->string('millage');
            $table->string('vehicle_type');
            $table->string('gear_type');
            $table->tinyInteger('isAc')->nullable();
            $table->tinyInteger('isPowerSteer')->nullable();
            $table->tinyInteger('isPowerMirroring')->nullable();
            $table->tinyInteger('isPowerWindow')->nullable();
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
