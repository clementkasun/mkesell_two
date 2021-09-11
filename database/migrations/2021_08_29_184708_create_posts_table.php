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
            $table->text('post_title')->nullable();
            $table->string('post_type'); // Vehicle, Motercycle and Spare Parts
            $table->text('price')->nullable();
            $table->text('location')->nullable();
            $table->text('additional_info')->nullable();
            $table->text('condition')->nullable();
            $table->text('main_image')->nullable();
            $table->text('image_1')->nullable();
            $table->text('image_2')->nullable();
            $table->text('image_3')->nullable();
            $table->text('image_4')->nullable();
            $table->text('image_5')->nullable();
            $table->unsignedBigInteger('make_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->unsignedBigInteger('spare_part_id')->nullable();
            $table->unsignedBigInteger('cust_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('make_id')->references('id')->on('vehicle_makes')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
        $table->dropSoftDeletes();
    }

}
