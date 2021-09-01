<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_type'); // Vehicle, Motercycle and Spare Parts
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->unsignedBigInteger('spare_part_id')->nullable();
            $table->unsignedBigInteger('wanted_id')->nullable();
            $table->unsignedBigInteger('post_title')->nullable();
            $table->text('main_image')->nullable();
            $table->text('image_1')->nullable();
            $table->text('image_2')->nullable();
            $table->text('image_3')->nullable();
            $table->text('image_4')->nullable();
            $table->text('image_5')->nullable();
            $table->foreign('vehicle_id')
                    ->references('id')
                    ->on('vehicles')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
    }

}
