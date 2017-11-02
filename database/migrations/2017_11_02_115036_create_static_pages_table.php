<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->integer('id')->praimary();
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->timestamps();
        });

        DB::table('static_pages')->insert(
            [
                [
                    'id' => '1',
                    'title_en'  => 'About us',
                    'title_ar' => 'About us',
                    'description_en' => '',
                    'description_ar' => '',
                ],
                [
                    'id' => '2',
                    'title_en'  => 'Terms',
                    'title_ar' => 'Terms',
                    'description_en' => '',
                    'description_ar' => '',
                ],
                [
                    'id' => '3',
                    'title_en'  => 'FAQs',
                    'title_ar' => 'FAQs',
                    'description_en' => '',
                    'description_ar' => '',
                ],
                [
                    'id' => '4',
                    'title_en'  => 'Privacy',
                    'title_ar' => 'Privacy',
                    'description_en' => '',
                    'description_ar' => '',
                ],
                [
                    'id' => '5',
                    'title_en'  => 'Sitemap',
                    'title_ar' => 'Sitemap',
                    'description_en' => '',
                    'description_ar' => '',
                ],
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}
