<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\YoutubeController;
use Alaouy\Youtube\Youtube;

class Content extends Model
{

    protected $table = 'vodcast_content';

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function playlistItems()
    {
        $ytController = new YoutubeController();
        $yt = $ytController->youtube;
        $results = $yt->getPlaylistItemsByPlaylistId($this->youtube_id)['results'];
        // foreach($results as $item){
        //     $item->video = $yt->getVideoInfo($item->contentDetails->videoId);
        // }
        return $results;
    }


}
