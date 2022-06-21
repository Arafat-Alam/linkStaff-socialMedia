<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('publisher_user_id')->unsigned()->nullable();
            $table->bigInteger('publisher_page_id')->unsigned()->nullable();
            $table->text('post_content');
            $table->enum('post_type', ['persons_post', 'pages_post'])->default('persons_post');
            $table->timestamps();

            $table->foreign('publisher_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('publisher_page_id')->references('id')->on('pages')->onDelete('cascade');
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
