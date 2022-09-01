<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('cate_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->smallInteger('square_feet');
            $table->integer('selling_price');
            $table->string('purpose');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('bathrooms');
            $table->string('address');
            $table->tinyInteger('featured')->nullable();
            $table->string('city');
            $table->string('image');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
