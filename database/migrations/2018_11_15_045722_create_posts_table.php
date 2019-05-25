<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('posts_id');
            $table->string('posts_title');
            $table->string('categories_name');
            $table->string('posts_short_description');
            $table->string('posts_long_description');
            $table->string('posts_image');
            $table->string('posts_author');
            $table->string('categories_type');
            $table->tinyInteger('posts_hit_count');
            $table->rememberToken();
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
        Schema::dropIfExists('posts');
    }
}
