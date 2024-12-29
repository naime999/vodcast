<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPlaylist extends Model
{
    protected $table = 'video_playlists'; // Specify the table name


    public function video()
    {
        return $this->hasOne(Content::class, 'id', 'content_id');
    }
}

