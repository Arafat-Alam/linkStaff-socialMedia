<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('follow_user_id')->unsigned()->nullable();
            $table->bigInteger('follow_page_id')->unsigned()->nullable();
            $table->enum('follow_type', ['follow_person', 'follow_page'])->default('follow_person');
            $table->timestamps();

            $table->foreign('follow_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('follow_page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow');
    }
}
