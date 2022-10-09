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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable(false);
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('playlist_id')->constrained();
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('playlist_id')->references('id')->on('playlists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');

//        Schema::table('posts', function (Blueprint $table) {
//            $table->dropForeign('lists_user_id_foreign');
//            $table->dropIndex('lists_user_id_index');
//            $table->dropColumn('user_id');
//        });
    }
};
