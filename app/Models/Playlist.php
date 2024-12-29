<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Content
    public function listItems()
    {
        return $this->hasMany(ContentPlaylist::class, 'playlist_id', 'id')->with('video');
    }
}

