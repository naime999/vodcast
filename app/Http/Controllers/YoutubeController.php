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

    public function playlistData(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);
        $content = Content::where('youtube_id', $request->id)->first();
        $content->views = $content->views + 1;
        $content->save();

        $playlist = $this->youtube->getPlaylistById($request->id);
        $orgDataList = $this->youtube->getPlaylistItemsByPlaylistId($request->id)['results'];
        $new_items = new \stdClass();
        $new_items->items = [];
        foreach($orgDataList as $item){
            if($item->status->privacyStatus == 'public'){
                $new_items->items[] = $item;
            }
        }
        $playlist->items = $new_items->items;

        $new_class = new \stdClass();
        $new_class->yt = $playlist;
        $new_class->content = $content;
        return response()->json($new_class);
        // return $playlist;
    }

    public function insidePlaylistData($ytId)
    {
        $playlist = $this->youtube->getPlaylistById($ytId);
        $playlist->items = $this->youtube->getPlaylistItemsByPlaylistId($ytId)['results'];
        return $playlist;
    }

    public function playerData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        $request->validate([
            'vid'   => 'required',
        ]);
        $content = Content::where('youtube_id', $request->vid)->first();
        $content->views = $content->views + 1;
        $content->save();
        $videoData = $this->youtube->getLocalizedVideoInfo($request->vid, 'pl');
        // $videoData->content = $videoData;
        $new_class = new \stdClass();
        $new_class->yt = $videoData;
        $new_class->content = $content;
        return response()->json($new_class);
    }

    public function contentLike(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        $request->validate([
            'id'   => 'required',
        ]);
        $content = Content::find($request->id);
        $content->likes = $content->likes + 1;
        $content->save();
        return response()->json($content);
    }

}
