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
        //
        Schema::create('vodcast_content', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Video title
            $table->text('description')->nullable(); // Video description
            $table->string('youtube_id')->unique(); // Unique YouTube video ID
            $table->string('thumbnail_url')->nullable(); // URL of the thumbnail
            $table->integer('duration')->unsigned()->nullable(); // Duration in seconds
            $table->integer('views')->unsigned()->default(0); // View count
            $table->integer('likes')->unsigned()->default(0); // Like count
            $table->boolean('is_public')->default(true); // Visibility
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // User relationship
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
