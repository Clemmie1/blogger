<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer("channle_id");
            $table->string("title");
            $table->string("category");
            $table->string("banner_img")->nullable();
            $table->text("content");
            $table->integer("total_views")->default(0)->unsigned()->nullable();
            $table->integer("total_likes")->default(0)->unsigned()->nullable();
            $table->integer("total_comments")->default(0)->unsigned()->nullable();
            $table->boolean("private")->default(0)->nullable();
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
};
