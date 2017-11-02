<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('paci')->nullable();
            $table->string('area')->nullable();
            $table->string('location')->nullable();
            $table->string('map')->nullable(); // latitudes, longitude
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
        Schema::dropIfExists('shop_locations');
    }
}
