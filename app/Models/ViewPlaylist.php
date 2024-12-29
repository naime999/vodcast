<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPlaylist extends Model
{
    use HasFactory;

    protected $table = 'view_playlists';

    // Relationship with Content
    public function listItems()
    {
        return $this->hasMany(VideoPlaylist::class, 'view_playlist_id', 'id')->with('video');
    }
}

