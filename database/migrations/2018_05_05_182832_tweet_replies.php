<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TweetReplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweet_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tweet_id')->unsigned();
            $table->integer('tweet_reply_id')->unsigned();
            $table->timestamps();

            $table->foreign('tweet_id')->references('id')->on('tweets');
            $table->foreign('tweet_reply_id')->references('id')->on('tweets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweet_replies');
    }
}
