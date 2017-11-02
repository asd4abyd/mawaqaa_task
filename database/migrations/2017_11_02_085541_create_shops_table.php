<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->string('image_path')->nullable();
            $table->string('phone_1', 20);
            $table->string('phone_2', 20)->nullable();
            $table->string('pref_description');
            $table->text('description');
            $table->string('map', 50)->nullable(); // latitudes, longitude
            $table->integer('delivery_time')->nullable();
            $table->decimal('delivery_charge')->nullable();
            $table->tinyInteger('is_active')->defualt(1);
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
        Schema::dropIfExists('shops');
    }
}
