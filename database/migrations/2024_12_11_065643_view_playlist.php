<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('view_playlists', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Playlist name
            $table->text('description')->nullable(); // Optional description
            $table->string('thumbnail')->nullable(); // Optional thumbnail URL or path
            $table->unsignedBigInteger('user_id'); // Foreign key for user (if playlists are user-specific)
            $table->timestamps(); // Created at and updated at

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        //
    }
};
