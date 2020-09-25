<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('BlogID');
            $table->string('Name');
            $table->integer('BlogCategoryID');
            $table->string('BannerImage')->default('0');
            $table->string('BannerImgPath')->default('0');
            $table->string('MainImage')->default('0');
            $table->string('mainimgpath')->default('0');
            $table->longText('Description');
            $table->tinyInteger('Status')->default('1');
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
        Schema::dropIfExists('blogs');
    }
}
