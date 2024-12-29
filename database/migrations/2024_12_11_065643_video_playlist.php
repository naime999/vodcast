<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('video_playlists', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('content_id'); // Foreign key for content
            $table->unsignedBigInteger('view_playlist_id'); // Foreign key for playlist
            $table->timestamps(); // Created at and updated at

            // Foreign key constraints
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->foreign('view_playlist_id')->references('id')->on('view_playlists')->onDelete('cascade');
        });
    }

    public function down()
    {
        //
    }
};
