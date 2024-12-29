<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Alaouy\Youtube\Youtube;
use App\Models\Content;

class YoutubeController extends Controller
{

    public $youtube;

    public function __construct()
    {
        $this->youtube = new Youtube(config('app.y_key'));
    }


    public function get(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);

        $id = Crypt::decrypt($request->id);
        $content = Content::find($id);
        $content->youtube = $this->youtube->getVideoInfo($content->youtube_id);
        return $content;
    }

    public function data(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);
        return $this->youtube->getVideoInfo($request->id);
    }

}
