<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('thumb_image');
            $table->text('short_description');
            $table->text('conten');
            $table->text('additional_conten');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->text('meta_description');
            $table->string('position');
            $table->string('published');
            $table->string('link');
            $table->string('slug');
            $table->integer('parent_id')->unsigned();
            $table->string('longitude');
            $table->string('latitude');
            $table->enum('more_config', ['0', '1'])->default('0');
            $table->enum('admin_config', ['0', '1'])->default('0');
            $table->string('lang')->default('id');
            $table->uuid('equal_id');
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
        Schema::drop('article');
    }
}
