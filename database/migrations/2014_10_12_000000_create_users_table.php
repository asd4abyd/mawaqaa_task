<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->default('');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('type')->default(2);
            $table->tinyInteger('provider')->default(0);
            $table->string('language', 3)->default('en');
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

//        DB::table('users')->insert(
//            [
//                'name'  => 'administrator',
//                'email' => 'admin@mawsool.com',
//                'password' => bcrypt('password'),
//                'phone' => '+962700000000',
//                'type' => '1',
//                'permission' => '1',
//                'active' => '1',
//            ]
//        );

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
