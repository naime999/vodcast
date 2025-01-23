<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\YoutubeController;

class UserInfo extends Model
{
    protected $table = 'user_info'; // Specify the table name

    protected $appends = ['youtube_data'];


    public function getYoutubeDataAttribute()
    {
        if($this->youtube_id != null){
            $ytController = new YoutubeController();
            $yt = $ytController->youtube;
            return $yt->getVideoInfo($this->youtube_id);
        }else{
            return null;
        }
    }
}
