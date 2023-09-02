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
        Schema::create('channles', function (Blueprint $table) {
            $table->id();
            $table->integer("owner_id");
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->boolean('verified')->default(0);
            $table->boolean('banned')->default(0);
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
        Schema::dropIfExists('channles');
    }
};
