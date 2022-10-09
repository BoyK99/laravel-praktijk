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
    public function up() {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image');
            $table->foreignId('user_id')->constrained();
//            $table->foreign('id')->references('user_id')->on('users');
            $table->timestamps();
//          Nummer, artiest,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('playlists');
    }
};
