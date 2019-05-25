<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_commnets', function (Blueprint $table) {
            $table->increments('comments_id');
            $table->tinyInteger('posts_id');
            $table->string('posts_commentor_name');
            $table->string('posts_commentor_email');
            $table->string('posts_comment_body');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
