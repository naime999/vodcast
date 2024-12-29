<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPlaylist extends Model
{
    protected $table = 'content_playlist'; // Specify the table name


    public function video()
    {
        return $this->hasOne(Content::class, 'id', 'content_id');
    }
}

