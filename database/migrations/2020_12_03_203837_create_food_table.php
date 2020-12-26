<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('foodName');
            $table->unsignedBigInteger('fkcategory_id');
            $table->json('component')->nullable();
            $table->string('notes')->nullable();
            $table->string('Description')->nullable();
            $table->string('food_image')->nullable();
            $table->boolean('is_special')->nullable();
            $table->string('cooking_time')->nullable();
            $table->boolean('status');
            $table->integer('vat')->nullable();
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
        Schema::dropIfExists('food');
    }
}
